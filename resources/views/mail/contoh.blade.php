<!DOCTYPE HTML>
<html>
    <head>
        <meta charset= utf-8>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Invoice-Donation-Receipt </title>
	</head>
    <body style="margin:auto;margin: 0;padding: 0;font-size: 16px;font-weight: 300;width: 100%;background: rgb(204, 204, 204);font-family: 'Poppins', sans-serif;">
		<div style="margin: auto;background:#fff;width:100%;max-width:270px;padding:15px;display:block;">
			<div class="container_fluid_invoice" style="background: #f2f8e5;padding: 20px !important;max-width: 100vw;border: 1px solid #ccc;border-radius: 6px;">
				<!-- logo -->
				<div class="logo_danako" style="text-align: center">
					<img src = "https://drive.google.com/uc?export=view&id=1VaN8CLypRWGHI2Ju1tHLEgEwiDzRfMob"
					 width = 200   
					 height = 46.5
					/>
				</div>
				<!-- judul invoice -->
				<p class="title_bold" style="margin-bottom: 35px;text-align: center;font-size:20px;font-weight: 600;position: relative;">DONATION RECEIPT</p>
				
				<!-- receiver row -->
        <table style="width: 100%">
					<thead>
						<tr>
							<td style="width: 50%; font-size: 14px">Kepada Yth</th>
							<td style="width: 50%; font-size: 14px; text-align:right">Donarion ID</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="font-size: 14px">{{ explode(' ', $data->name ?? 'PUPUT TOK')[0] ?? '-' }}</td>
              <td style="font-size: 14px;text-align:right">{{ $data->external_id ?? 'KJGJHIGUIFUG' }}</td>
						</tr>
					</tbody>
				</table>
				
				<!-- ucapan terimakasih -->
				<div class="thankyou" style="position: relative;text-align: center;margin-top: 25px;margin-bottom: 35px;font-size: 13px;font-weight: 400;">
					<p>
						Terimakasih telah menyalurkan bantuan melalui DANAKO bersama LMI <br>
						Semoga Allah SWT memberikan keberkahan atas rezeki yang sudah Bapak/Ibu berikan <br>
					</p>
				</div>
				<!-- Detail Pembayaran -->
				<div class="payment_detail" style="position: relative;text-align: left;margin-top: 20px;margin-bottom: 10px;font-size: 13px;font-weight: 400;">
					<table style="width: 100%">
						<tr>                           
							<th colspan="3" style="text-align: center; padding-bottom: 10px">Detail Pembayaran</th>
						</tr>
						<tr>
							<th>Tanggal Pembayaran</th>
							<th>:</th>
							<td>{{ date('d/m/Y, H:i', strtotime($data->paid_at ?? null)) ?? '-' }}</td>
						</tr>
						<tr>
							<th>Metode Pembayaran</th>
							<th>:</th>
							<td>{{ $data->payment_channel ?? '-' }}</td>
						</tr>
					</table>
				</div>
				<div class="table_detail" style="width:100%;text-align:center;margin-top: 40px;font-size: 13px;font-family: 'Poppins', sans-serif;">
				<table border="2px solid" style="width: 100%">
				<tr>
					<th colspan="3" style="background:#0EBF65;">DETAIL DONASI</th>
				</tr>
				<tr>
					<th> Jenis Donasi </th>
					<th> Deskripsi </th>
					<th> Nominal </th>
				</tr>
				<tr>
					<td>Sedekah {{ $data->campaign->category->name ?? '-' }}</td>
					<td>{{ $data->campaign->title ?? '-' }}</td>
					<td>{{ number_format($data->amount_donations ?? 0,0,',','.') }}</td>
				</tr>
				<tr>
					<td colspan="2"> <b>TOTAL</b></td>
					<td>{{ number_format($data->amount_donations ?? 0,0,',','.') }}</td>
				</tr>
				</table>
				</div>
				<div class="contact_person" style="margin-top:50px;font-size:11px;text-align: center;">
					<p>
					Untuk informasi lebih lanjut mengenai donasi anda, silahkan hubungi<br>
					email : lct.lmi@gmail.com | phone :
					</p>
				</div>
			</div>
		</div>
    </body>
</html>