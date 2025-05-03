from flask import Flask, render_template, request, jsonify

app = Flask(__name__)

@app.route('/view_record', methods=['GET'])
def view_record():
    control_number = request.args.get('control_number')
    return f"Viewing record for Control Number: {control_number}"

if __name__ == '__main__':
    app.run(debug=True)
