<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if(!empty($pesan_sukses)): ?>
    <h2><?=$pesan_sukses;?></h2>
    <p><?=$email_tujuan;?></p>
    <p><?=$pesan;?></p>
    <?php endif; ?>
    <form action="<?=base_url('email/kirim')?>" method="POST">
        <input type="text" name="email_kirim" value="email tujuan"><br>
        <input type="text" name="judul_email" value="judul email"> <br>
        <textarea name="pesan" id="" cols="30" rows="10"></textarea>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>