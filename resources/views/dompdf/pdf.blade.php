<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Generator</title>
</head>

<style>
    /* dompdf日本語文字化け対策 */
    /* タグによって太さが違うため、それに応じて全てにfont-faceを書く必要あり */

    @font-face {
        font-family: ipaexg;
        font-style: normal;
        font-weight: normal;
        src: url('{{ storage_path('fonts/ipaexg.ttf') }}');
    }

    @font-face {
        font-family: ipaexg;
        font-style: 600;
        font-weight: 600;
        src: url('{{ storage_path('fonts/ipaexg.ttf') }}');
    }

    @font-face {
        font-family: ipaexg;
        font-style: bold;
        font-weight: bold;
        src: url('{{ storage_path('fonts/ipaexg.ttf') }}');
    }

    html,
    body,
    textarea {
        font-family: ipaexg, saÏns-serif;
    }
    
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #555;
        text-transform: uppercase;
        font-size: 12px;
    }

    tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

<body>
    <h2>請求書</h2>
    <p>日付: {{ $date }}</p>
    <p>会社名: {{ $company_name }}</p>
    <p>名前: {{ $name }}</p>
    <p>メールアドレス: {{ $email }}</p>
    <table border="1" style="width: 100%; max-width: 100%;">
      <thead>
          <tr>
              <th style="width: 10%;">商品名</th>
              <th style="width: 5%;">数量</th>
              <th style="width: 10%;">単価</th>
              <th style="width: 10%;">金額</th>
              <th style="width: 5%;">消費税</th>
              <th style="width: 10%;">合計</th>
              <th style="width: 10%;">支払い方法</th>
              <th style="width: 10%;">発送日</th>
              <th style="width: 10%;">注文日</th>
              <th style="width: 20%;">備考</th>
          </tr>
      </thead>
      <tbody>
          @for ($i = 1; $i <= 30; $i++)
          <tr>
              <td>商品{{ $i }}</td>
              <td>{{ rand(1, 10) }}</td>
              <td>{{ rand(100, 1000) }}</td>
              <td>{{ rand(100, 1000) * rand(1, 10) }}</td>
              <td>{{ rand(5, 10) }}%</td>
              <td>{{ rand(100, 1000) * rand(1, 10) }}</td>
              <td>クレジットカード</td>
              <td>{{ now()->addDays(rand(1, 10))->format('Y-m-d') }}</td>
              <td>{{ now()->subDays(rand(1, 30))->format('Y-m-d') }}</td>
              <td>備考{{ $i }}</td>
          </tr>
          @endfor
      </tbody>
  </table>
</body>

</html>
