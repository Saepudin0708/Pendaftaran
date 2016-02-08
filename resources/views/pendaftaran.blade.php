<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pendaftaran</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            <br>
               @include('header')
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12"> 
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pendaftaran</h3>
                    </div>
                    <div class="panel-body">
                    <div class="alert alert-danger" role="alert" id="alert" style="display:none">
                    </div>
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Tahun Ajaran</label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="tahun_ajaran">
                                        <option value="">-- Pilih tahun ajaran --</option>
                                        <option>2015</option>
                                        <option>2016</option>
                                    </select>
                                    <span id="tahun_ajaran_error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Nama Lengkap</label>
                                <div class="col-lg-6">
                                    <input id="nama_lengkap" type="text" class="form-control" placeholder="Tuliskan nama lengkap" size="" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="jenis_kelamin" class="col-lg-2 control-label">Jenis Kelamin</label>
                                <div class="col-lg-6">
                                    <select class="form-control">
                                        <option value="">-- Pilih jenis kelamin --</option>
                                        <option value="male">Pria</option>
                                        <option value="female">Wanita</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label id="agama" class="col-lg-2 control-label">Agama</label>
                                <div class="col-lg-6">
                                    <select class="form-control">
                                        <option value="">-- Pilih agama --</option>
                                        <option value="islam">Islam</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Tempat, Tanggal Lahir</label>
                                <div class="col-lg-3">
                                    <input id="tempat_lahir" type="text" class="form-control" placeholder="Tuliskan tempat kelahiran" size="" value="">
                                </div>
                                <div class="col-lg-2">
                                    <select id="tahun" class="form-control">
                                        <option value="">-- Pilih tahun --</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select id="bulan" class="form-control">
                                        <option value="">-- Pilih bulan --</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select id="tanggal" class="form-control">
                                        <option value="">-- Pilih tanggal --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Alamat Lengkap</label>
                                <div class="col-lg-6">
                                    <textarea id="alamat" class="form-control" style="min-height:150px;"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label"></label>
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" id="submit">Submit</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script>
    $("#submit").click(function(){

        $.ajax({
            url: "/daftar",
            method: "POST",
            data: 
            {
                tahun_ajaran : $("#tahun_ajaran").val(),
                nama_lengkap : $("#nama_lengkap").val(),
                jenis_kelamin : $("#jenis_kelamin").val(),
                agama : $("#agama").val(),
                tempat_lahir : $("#tempat_lahir").val(),
                tahun : $("#tahun").val(),
                bulan : $("#bulan").val(),
                tanggal : $("#tanggal").val(),
                alamat : $("#alamat").val(),
            },
            dataType: "json",
            success: function(data) {
                if (data.tahun_ajaran) {
                    $("#tahun_ajaran_error").html(data.tahun_ajaran);
                    $("#tahun_ajaran_error").fadeIn();
                } else {
                    $("#tahun_ajaran_error").fadeOut();
                }
            }
        })

    });
    </script>
  </body>
</html>

