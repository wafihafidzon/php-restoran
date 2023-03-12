    <?php
    include '../function.php';
    @$makanan = $_POST['makanan'];
    @$minuman = $_POST['minuman'];


    ?>

    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>

    <center>
        <page style="font-size: 14px">
            <table style='width:350px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border='0'>
                <td width='70%' align='CENTER' vertical-align:top'><span style='color:black;'>
                        <b>APOTEK GEMILANG FARMA</b></br>JL XXXXXXXXXXX XXXXXXX</span></br>


                    <span style='font-size:12pt'>No. : xxxxx, 11 Juni 2020 (user:xxxxx), 11:57:50</span></br>
                </td>
            </table>
            <style>
                hr {
                    display: block;
                    margin-top: 0.5em;
                    margin-bottom: 0.5em;
                    margin-left: auto;
                    margin-right: auto;
                    border-style: inset;
                    border-width: 1px;
                }
            </style>
            <table cellspacing='0' cellpadding='0' style='width:350px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>

                <tr align='center'>
                    <td width='70%'>Item</td>
                    <td width='13%'>Price</td>
                    <td width='4%'>Qty</td>
                    <td width='13%'>Total</td>
                <tr>
                    <td colspan='5'>
                        <hr>
                    </td>
                </tr>
                </tr>
                <?php
                    foreach ($_SESSION['cart'] as $cart => $val) {
                        if(isset($minuman) && $val['kategori'] == "Minuman"){
                            $subtotal0 = $val['harga'] * $val['jumlah'];?>
                    
                    <tr>
                    <td style='vertical-align:top'><?= $val['menu'] ?></td>
                    <td style='vertical-align:top; text-align:right; padding-right:30px'><?= $val['harga'] ?></td>
                    <td style='vertical-align:top; text-align:right; padding-right:10px'><?= $val['jumlah'] ?></td>
                    <td style='text-align:right; vertical-align:top'><?= $subtotal0 ?></td>
                </tr>
                <?php }}; ?>
                    
                    <?php
                    foreach ($_SESSION['cart'] as $cart => $val) {
                    if (isset($makanan) && $val['kategori'] == "Makanan") {
                    $subtotal1 = $val['harga'] * $val['jumlah'];?>
                   <tr>
                       <td style='vertical-align:top'><?= $val['menu'] ?></td>
                       <td style='vertical-align:top; text-align:right; padding-right:30px'><?= $val['harga'] ?></td>
                       <td style='vertical-align:top; text-align:right; padding-right:10px'><?= $val['jumlah'] ?></td>
                       <td style='text-align:right; vertical-align:top'><?= $subtotal1 ?></td>
                    </tr> 
                <?php }}; 
                $total = @$subtotal0 + @$subtotal1?>

                <tr>
                    <td colspan='5'>
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan='4'>
                        <div style='text-align:right; color:black'>Total : </div>
                    </td>
                    <td style='text-align:right; font-size:16pt; color:black'><?= $total ?></td>
                </tr>
                <tr>
                    <td colspan='4'>
                        <div style='text-align:right; color:black'>Cash : </div>
                    </td>
                    <td style='text-align:right; font-size:16pt; color:black'>1.000.000</td>
                </tr>
                <tr>
                    <td colspan='4'>
                        <div style='text-align:right; color:black'>Change : </div>
                    </td>
                    <td style='text-align:right; font-size:16pt; color:black'>252.500</td>
                </tr>
                <tr>
                    <td colspan='4'>
                        <div style='text-align:right; color:black'>DP : </div>
                    </td>
                    <td style='text-align:right; font-size:16pt; color:black'>0</td>
                </tr>
                <tr>
                    <td colspan='4'>
                        <div style='text-align:right; color:black'>Sisa : </div>
                    </td>
                    <td style='text-align:right; font-size:16pt; color:black'>0</td>
                </tr>
            </table>
            <table style='width:350; font-size:12pt;' cellspacing='2'>
                <tr></br>
                    <td align='center'>****** TERIMAKASIH ******</br></td>
                </tr>
            </table>
    </center>
    <button onclick="window.print();" class="noPrint"> klik < <style>

            @media print {
            .noPrint{
            display:none;
            }
            }
            h1{
            color:#f6f6;
            }
            @page
            {
            size: auto; /* auto is the initial value */
            margin: 0mm; /* this affects the margin in the printer settings */
            }
            html
            {
            background-color: #FFFFFF;
            margin: 0mm; /* this affects the margin on the html before sending to printer */
            }
            body
            {
            padding:30px; /* margin you want for the content */
            }
            </style>
            </page>