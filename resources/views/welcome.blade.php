<!DOCTYPE html>
<html>
<head>
</head>
<body>

<form action="{{ route('saveData') }}" method="POST">
{{ csrf_field() }}

<button type="submit">Save!</button>
</form>

{{ $entry }}
</body>
</html>
