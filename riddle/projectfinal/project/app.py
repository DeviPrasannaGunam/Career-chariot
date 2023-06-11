from flask import Flask, request, render_template
import time

app = Flask(__name__)

start_time = None

@app.route('/')
def first_page():
    return render_template('first.html')

@app.route('/finalgift')
def final_page():
    global start_time
    time_taken = None
    if start_time is not None:
        time_taken = time.time() - start_time
        start_time = None
    return render_template('finalgift.html', time_taken=time_taken)

@app.route('/admin')
def admin_page():
    global start_time
    if start_time is not None:
        time_taken = time.time() - start_time
        return render_template('admin2.php', time_taken=time_taken)
    else:
        return render_template('admin2.php', time_taken=None)

@app.route('/start journey', methods=['POST'])
def ready():
    global start_time
    start_time = time.time()
    return render_template('finalgift.html', start_time=start_time)

if __name__ == '__main__':
    app.run(debug=True)
