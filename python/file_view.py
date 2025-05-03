from reportlab.lib.pagesizes import landscape, letter
from reportlab.pdfgen import canvas
from reportlab.lib.utils import ImageReader
from reportlab.lib import colors
from reportlab.platypus import Table, TableStyle
from reportlab.graphics.barcode import code128
import os
import random
import string
from datetime import datetime

def generate_random_filename(prefix="ROUTER_SLIP_", suffix=".pdf"):
    """Generate a random filename with timestamp"""
    timestamp = datetime.now().strftime("%Y%m%d_%H%M%S")
    random_str = ''.join(random.choices(string.ascii_uppercase + string.digits, k=4))
    return f"{prefix}{timestamp}_{random_str}{suffix}"

def draw_checkbox(pdf, x, y, size=10, checked=False):
    """Draw a checkbox with black outline and no fill"""
    # Save current graphics state
    pdf.saveState()
    
    # Set stroke color to black, no fill
    pdf.setStrokeColor(colors.black)
    pdf.setFillColor(colors.white)
    
    # Draw checkbox outline (stroke=1 means draw border, fill=0 means no fill)
    pdf.rect(x, y, size, size, fill=0, stroke=1)
    
    # Draw checkmark if checked
    if checked:
        pdf.setLineWidth(1)  # Set line thickness
        pdf.line(x+2, y+2, x+size-2, y+size-2)  # Diagonal \
        pdf.line(x+size-2, y+2, x+2, y+size-2)  # Diagonal /
    
    # Restore graphics state
    pdf.restoreState()

def generate_router_slip():
    # Generate random filename
    output_filename = generate_random_filename()
    
    # Create PDF in landscape orientation
    pdf = canvas.Canvas(output_filename, pagesize=landscape(letter))
    width, height = landscape(letter)

    control_number = f"UDHO2025-{random.randint(1000, 9999)}"
    
    logos = [
        {
            "path": "assets/PILIPINASLOGO.png",
            "width": 64,
            "height": 64,
            "x_offset": 0,  # Additional horizontal adjustment
            "y_offset": 0   # Additional vertical adjustment
        },
        {
            "path": "assets/PASAYLOGO.png",
            "width": 64,
            "height": 64,
            "x_offset": 0,
            "y_offset": 0
        },
        {
            "path": "assets/UDHOLOGO.png",
            "width": 64,
            "height": 64,
            "x_offset": 0,
            "y_offset": 0
        }
    ]
    # Calculate total width and center position
    total_logos_width = sum(logo["width"] for logo in logos) + (len(logos) - 1) * 20
    start_x = (width - total_logos_width) / 2
    
    # Vertical position for logos (lower on page to allow space for text below)
    logo_y = height - 100
    
    # Position logos with equal spacing, centered
    current_x = start_x
    for i, logo in enumerate(logos):
        try:
            if os.path.exists(logo["path"]):
                img = ImageReader(logo["path"])
                x_pos = current_x + logo["x_offset"]
                y_pos = logo_y + logo["y_offset"]
                
                pdf.drawImage(
                    img,
                    x_pos,
                    y_pos,
                    width=logo["width"],
                    height=logo["height"],
                    mask='auto'
                )
                
                # Move position for next logo (width + spacing)
                current_x += logo["width"] + 20
                
        except Exception as e:
            print(f"Error loading logo {logo['path']}: {e}")

    # Header text positioned below logos
    max_logo_height = max(logo["height"] for logo in logos)
    text_y = logo_y - max_logo_height - -50
    
    pdf.setFont("Helvetica-Bold", 13)
    pdf.drawCentredString(width / 2, text_y - 20, "Republic of the Philippines")
    pdf.setFont("Helvetica-Bold", 16)
    pdf.drawCentredString(width / 2, text_y - 40, "Urban Development and Housing Office")
    pdf.setFont("Helvetica", 12)
    pdf.drawCentredString(width / 2, text_y - 60, "Pasay City, Metro Manila")

    line_y = text_y - 80  # Position line below header
    pdf.setLineWidth(2)  # Set line thickness (2 points for bold)
    pdf.line(40, line_y, width - 40, line_y)  # Draw line from left to right margin
    pdf.setLineWidth(1)  # Reset to default line width

    # Control Number and Incoming/Outgoing
    form_start_y = text_y - 100  # Start form fields below the header text
    pdf.setFont("Helvetica", 10)
    pdf.drawString(40, form_start_y, f"Control No.: {control_number}")
    pdf.drawString(width/2 + 20, form_start_y, "Incoming")  # Label
    draw_checkbox(pdf, width/2 + 70, form_start_y - 2)      # Checkbox
    pdf.drawString(width/2 + 90, form_start_y, "Outgoing")  # Label
    draw_checkbox(pdf, width/2 + 140, form_start_y - 2)     # Checkbox

    # Document Type
    # Document Type Section
    pdf.setFont("Helvetica", 10)
    pdf.drawString(40, form_start_y - 20, "Document Type:")

    # Memo Letter checkbox
    pdf.drawString(130, form_start_y - 20, "Memo")
    draw_checkbox(pdf, 170, form_start_y - 22)  # Adjusted y-position by -2 for alignment
    pdf.drawString(190, form_start_y - 20, "Referral")
    draw_checkbox(pdf, 240, form_start_y - 22)
    pdf.drawString(260, form_start_y - 20, "Report")
    draw_checkbox(pdf, 300, form_start_y - 22)
    pdf.drawString(320, form_start_y - 20, "Invitation")
    draw_checkbox(pdf, 370, form_start_y - 22)

    # Second line of Document Type
    pdf.drawString(130, form_start_y - 35, "Letter")
    draw_checkbox(pdf, 170, form_start_y - 35)
    pdf.drawString(190, form_start_y - 35, "Request")
    draw_checkbox(pdf, 240, form_start_y - 35)
    pdf.drawString(260, form_start_y - 35, "Proposal")
    draw_checkbox(pdf, 306, form_start_y - 35)
    pdf.drawString(320, form_start_y - 35, "Others: ___________")

    # Priority Section
    pdf.drawString(40, form_start_y - 50, "Priority:")
    pdf.drawString(130, form_start_y - 50, "3 days")
    draw_checkbox(pdf, 170, form_start_y - 52)
    pdf.drawString(190, form_start_y - 50, "7 days")
    draw_checkbox(pdf, 240, form_start_y - 52)
    pdf.drawString(260, form_start_y - 50, "15 days")
    draw_checkbox(pdf, 300, form_start_y - 52)
    pdf.drawString(320, form_start_y - 50, "20 days")
    draw_checkbox(pdf, 360, form_start_y - 52)

    # Type of Copy Sent
    pdf.drawString(width/2 + 0, form_start_y - 50, "Type of Copy Sent:")
    pdf.drawString(width/2 + 100, form_start_y - 50, "Original")
    draw_checkbox(pdf, width/2 + 150, form_start_y - 52)
    pdf.drawString(width/2 + 170, form_start_y - 50, "Photocopy")
    draw_checkbox(pdf, width/2 + 220, form_start_y - 52)
    pdf.drawString(width/2 + 240, form_start_y - 50, "Scanned")
    draw_checkbox(pdf, width/2 + 280, form_start_y - 52)
    # Sender, Date/Time, Contact No.
    pdf.drawString(40, form_start_y - 70, "Sender: __________________________")
    pdf.drawString(width/2 - 80, form_start_y - 70, "Date/Time: __________________________")
    pdf.drawString(width - 250, form_start_y - 70, "Contact No.: __________________________")
    
    # Subject
    pdf.drawString(40, form_start_y - 90, "Subject: _________________________________________________________________")
    
    # Create a Table
    table_top = form_start_y - 130  # Position table below form fields
    data = [
        ["DATE", "FROM", "TO", "Required Actions/Instructions", "Due Date", "Action Taken"],
        ["", "", "", "", "", ""],
        ["", "", "", "", "", ""],
        ["", "", "", "", "", ""],
        ["", "", "", "", "", ""],
        ["", "", "", "", "", ""],
        ["", "", "", "", "", ""]
    ]
    
    table = Table(data, colWidths=[80, 120, 120, 200, 80, 100], rowHeights=[30, 20, 20, 20, 20,20,20])
    table.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), colors.lightgrey),
        ('TEXTCOLOR', (0,0), (-1,0), colors.black),
        ('ALIGN', (0,0), (-1,-1), 'CENTER'),
        ('FONTNAME', (0,0), (-1,0), 'Helvetica-Bold'),
        ('FONTSIZE', (0,0), (-1,0), 10),
        ('BOTTOMPADDING', (0,0), (-1,0), 12),
        ('GRID', (0,0), (-1,-1), 1, colors.black),
    ]))
    
    table.wrapOn(pdf, width, height)
    table.drawOn(pdf, 40, table_top - 100)  # Adjusted y-position
    
    # Reminder Section
    reminder_top = table_top - 120  # Position reminder below table
    pdf.setFont("Helvetica", 8)
    reminder_text = [
        "Reminders: Under Sec. 5 of RA 6713, otherwise known as the Code of Conduct and Ethical Standards for Public Officials and Employees, enjoins all public servants to respond to letters,",
        "telegrams, and other means of communication sent by the public within fifteen (15) working days from the receipt thereof. The reply must contain the action taken on the request.",
        "Likewise, all official papers and documents must be processed and completed within a reasonable time."
    ]
    
    for i, line in enumerate(reminder_text):
        pdf.drawString(40, reminder_top - (i * 12), line)

    barcode_x = width - 450  # Position on right side
    barcode_y = reminder_top - len(reminder_text) * 12 - 60  # Position below reminder text

    barcode_x += 50  # Adjust barcode x-position to center it
    
    # Generate barcode (smaller size to fit in the space)
    barcode = code128.Code128(control_number, barHeight=40, barWidth=2)
   
    barcode.drawOn(pdf, barcode_x, barcode_y)
    
    # Control number below barcode
    pdf.setFont("Helvetica", 8)
    pdf.drawString(barcode_x - -170, barcode_y - 15, control_number)


    # Save the PDF
    pdf.save()
    print(f"Successfully generated: {output_filename}")
    return output_filename

# Generate the router slip
if __name__ == "__main__":
    generated_file = generate_router_slip()