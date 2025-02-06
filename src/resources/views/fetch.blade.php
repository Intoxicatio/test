<!DOCTYPE html>
<html>
<head>
    <title>API Request Form</title>
</head>
<body>
    <h1>API Request Form</h1>
    <form action="{{ route('fetch.submit') }}" method="POST">
        @csrf
        <div>
            <label for="url">URL:</label>
            <input type="text" id="url" name="url" required>
        </div>
        <div>
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required>
        </div>
        <div>
            <label for="key">Key:</label>
            <input type="text" id="key" name="key" required>
        </div>
        <div>
            <label for="dateFrom">Date From:</label>
            <input type="date" id="dateFrom" name="dateFrom" required>
        </div>
        <div>
            <label for="dateTo">Date To:</label>
            <input type="date" id="dateTo" name="dateTo" required>
        </div>
        <div>
            <label for="page">Page:</label>
            <input type="number" id="page" name="page" required>
        </div>
        <div>
            <label for="limit">Limit:</label>
            <input type="number" id="limit" name="limit" required>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
