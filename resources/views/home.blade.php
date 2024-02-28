<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Generetor</title>
</head>

<body>
    <h2>会社名、名前、メールアドレスを入力してください</h2>
    <form id="myForm" action="{{ route('dompdf.generate-pdf') }}" method="post">
        @csrf
        <label for="company_name">会社名:</label><br>
        <input type="text" id="company_name" name="company_name" value="{{ old('company_name') }}"><br>
        @error('company_name')
            <span style="color: red;">{{ $message }}</span><br>
        @enderror
        <label for="name">名前:</label><br>
        <input type="text" id="name" name="name" value="{{ old('name') }}"><br>
        @error('name')
            <span style="color: red;">{{ $message }}</span><br>
        @enderror
        <label for="email">メールアドレス:</label><br>
        <input type="email" id="email" name="email" value="{{ old('email') }}"><br><br>
        @error('email')
            <span style="color: red;">{{ $message }}</span><br>
        @enderror
        <input type="submit" value="次へ">
    </form>
</body>

</html>
