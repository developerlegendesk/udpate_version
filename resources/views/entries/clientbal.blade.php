<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Debtors Balances</title>

    <style type="text/css">
        @page {margin: 20px;}
        body {margin: 10px;}
        * {font-family: Verdana, Arial, sans-serif;}
        a {text-decoration: none;}
        table {font-size: x-small;}
        tfoot tr td {font-weight: bold;font-size: medium;}
        .invoice table {margin: 15px;}
        .invoice h3 {margin-left: 15px;}
        .information {background-color: #fff;}
        .information .logo {margin: 5px;}
        .information table {padding: 10px;}
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
</head>
<body>
    <?php
            $fmt = new NumberFormatter( 'en_GB', NumberFormatter::CURRENCY );
            $amt = new NumberFormatter( 'en_GB', NumberFormatter::SPELLOUT );
            $fmt->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, 0);
            $fmt->setSymbol(NumberFormatter::CURRENCY_SYMBOL, '');

                $accounts = App\Models\Account::all();
                $obalance = [];
                $oite= 0;
                foreach ($accounts as $account) {
                    $balance = 0;
                    $lastbalance = 0;
                    foreach ($account->entries as $entry) {
                        $balance= $lastbalance + floatval($entry->debit) - floatval($entry->credit);
                        $lastbalance = $balance;
                    }
                    $obalance[$oite++] = $balance;
                }

                $debit = 0;

           $dt = \Carbon\Carbon::now(new DateTimeZone('Asia/Karachi'))->format('M d, Y - h:m a');
    ?>


<div class="information">
    <table width="100%" style="border-collapse: collapse;">
            <thead>
            <tr>
            <th align="left" style="width: 50%;">
            <h3>Debtors Balances</h3>
            </th>
            <th colspan='2' align="right" style="width: 30%;">
                <h5>Generated on: {{ $dt}}</h5>
            </th>
            </tr>


        <tr>
            <th style="width: 70%;border-bottom:2pt solid black;">
                <strong>Client</strong>

            </th>
            <th style="width: 15%;border-bottom:2pt solid black;" align="centre">
                <strong>Balance</strong>

            </th>
        </tr>
            </thead>
            <tbody>
        @foreach ($accounts as $account)
                    @if(!$account->client)
                    @continue
                    @endif

                @if($obalance[$loop->index]==0)
                @continue
                @endif

        <tr>
            <td style="width: 15%;">
                {{$account->head_of_account}}
            </td>
            <td style="width: 10%; border-left: 1pt solid black;" align="right">
                {{str_replace(['Rs.','.00'],'',$fmt->formatCurrency($obalance[$loop->index],'Rs.'))}}
            </td>
        </tr>
        <?php $debit = $debit + $obalance[$loop->index]; ?>
        @endforeach
        <tr>
                <td>
                <strong>Total</strong>
                </td>
                <td style="width: 10%; border-left: 1pt solid black; border-top: 1pt solid black; border-bottom: 3pt double black;" align="right">
                {{str_replace(['Rs.','.00'],'',$fmt->formatCurrency($debit,'Rs.'))}}
                </td>
        </tr>
            </tbody>

    </table>
</div>
<br/>
<script type="text/php">
    if (isset($pdf)) {
        $x = 500;
        $y = 820;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 10;
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $word_space, $char_space, $angle);
    }
</script>
</body>
</html>
