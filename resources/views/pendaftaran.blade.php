<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pendaftaran</title>

    <!-- Bootstrap -->
    <link href="{{ \URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ \URL::asset('css/main.css') }}" rel="stylesheet">

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
                                    <span class="error-span" id="tahun_ajaran_error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Nama Lengkap</label>
                                <div class="col-lg-6">
                                    <input id="nama_lengkap" type="text" class="form-control" placeholder="Tuliskan nama lengkap" size="" value="">
                                    <span class="error-span" id="nama_lengkap_error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Jenis Kelamin</label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="jenis_kelamin">
                                        <option value="">-- Pilih jenis kelamin --</option>
                                        <option value="male">Pria</option>
                                        <option value="female">Wanita</option>
                                    </select>
                                    <span class="error-span" id="jenis_kelamin_error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Agama</label>
                                <div class="col-lg-6">
                                    <select class="form-control" id="agama">
                                        <option value="">-- Pilih agama --</option>
                                        <option value="islam">Islam</option>
                                    </select>
                                    <span class="error-span" id="agama_error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Tempat, Tanggal Lahir</label>
                                <div class="col-lg-3">
                                    <input id="tempat_lahir" type="text" class="form-control" placeholder="Tuliskan tempat kelahiran" size="" value="">
                                    <span class="error-span" id="tempat_lahir_error"></span>
                                </div>
                                <div class="col-lg-2">
                                    <select id="tahun" class="form-control">
                                        <option value="">-- Pilih tahun --</option>
                                        <?php for ($y = date("Y") - 15; $y <= date("Y"); $y++) : ?>
                                        <option value="<?=$y?>"><?=$y?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <span class="error-span" id="tahun_error"></span>
                                </div>
                                <div class="col-lg-2">
                                    <select id="bulan" class="form-control">
                                        <option value="">-- Pilih bulan --</option>
                                        <?php for ($m = 1; $m <= 12; $m++) : ?>
                                        <option value="<?=$m?>"><?=$m?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <span class="error-span" id="bulan_error"></span>
                                </div>
                                <div class="col-lg-2">
                                    <select id="tanggal" class="form-control">
                                        <option value="">-- Pilih tanggal --</option>
                                        <?php for ($d = 1; $d <= 31; $d++) : ?>
                                        <option value="<?=$d?>"><?=$d?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <span class="error-span" id="tanggal_error"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Alamat Lengkap</label>
                                <div class="col-lg-6">
                                    <textarea id="alamat" class="form-control" style="min-height:150px;"></textarea>
                                    <span class="error-span" id="alamat_error"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Photo</label>
                                <div class="col-lg-3">
                                    <img src="/img/upload-logo-icon.png" id="preview" style="width:150px;" onclick="$('#photo').click();">
                                    <input type="hidden" id="photo-name" style="display:none"><br><br>
                                    <div class="progress">
                                      <div class="upload-photo-progress progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                      </div>
                                    </div>
                                </div>
                                <input type="hidden" name="foto" id="foto">
                                <span class="error-span" id="foto_error"></span>
                            </div>

                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label"></label>
                                <div class="col-lg-6">
                                    <a class="btn btn-primary" id="submit">Submit</a>
                                </div>
                            </div>
                        </form>

                        <form action="/daftar/tmpupload" method="POST" enctype="multipart/form-data" id="form-upload">
                            <input type="file" name="photo" class="form-control" id="photo" style="display:none;" onchange="$('#photo-submit').click()">
                            <input type="submit" id="photo-submit" name="submit" value="submit" style="display:none;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ \URL::asset('js/bootstrap.min.js') }}"></script>

    <script>
    $("#submit").click(function(){

        $.ajax({
            <?php if (!empty($data)) : ?>
            url: "{{ route('daftaredit_patch', <?= $data->id ?>) }}",
            <?php else : ?>
            url: "{{ route('daftar_post') }}",
            <?php endif; ?>
            method: "PATCH",
            data: 
            {
                <?php if (!empty($data)) : ?>
                id : <?= $data->id ?>,
                <?php endif; ?>
                tahun_ajaran : $("#tahun_ajaran").val(),
                nama_lengkap : $("#nama_lengkap").val(),
                jenis_kelamin : $("#jenis_kelamin").val(),
                agama : $("#agama").val(),
                tempat_lahir : $("#tempat_lahir").val(),
                tahun : $("#tahun").val(),
                bulan : $("#bulan").val(),
                tanggal : $("#tanggal").val(),
                alamat : $("#alamat").val(),
                foto : $("#foto").val()
            },
            dataType: "json",
            success: function(data) {
                $(".error-span").hide();
                alert(data.message);
                //reset semua parameter
                $("#tahun_ajaran").val("");
                $("#nama_lengkap").val("");
                $("#jenis_kelamin").val("");
                $("#agama").val("");
                $("#tempat_lahir").val("");
                $("#tahun").val("");
                $("#bulan").val("");
                $("#tanggal").val("");
                $("#alamat").val("");
                $("#foto").val("");
                $('#preview').attr( { 'src' : '/img/upload-logo-icon.png' } );
                $('.upload-photo-progress').width('0%');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Obj = jqXHR.responseJSON;
                $(".error-span").hide();
                $.each(Obj, function(Kunci, Nilai) {
                    $("#" + Kunci + "_error").html(Nilai);
                    $("#" + Kunci + "_error").show();
                });
            }
        })

    });
    </script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script>
    (function() {
       
    $('#form-upload').ajaxForm({
        beforeSend: function() {
            $('#preview').attr( { 'src' : '/img/loading.gif' } );
            var percentVal = '0%';
            $('.upload-photo-progress').width(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            $('.upload-photo-progress').width(percentVal);
        },
        success: function(result) {
            if (result.photo) {
                var percentVal = '100%';
                $('.upload-photo-progress').width(percentVal);
                $('#preview').attr( { 'src' : '/tmp/' + result.photo } );
                $("#foto").val(result.photo);
            } else {
                var percentVal = '0%';
                $('.upload-photo-progress').width(percentVal);
            }
        },
        complete: function(xhr) {
            
        }
    }); 

    })();

    $(document).ready(function(){
    <?php if (!empty($data)) : ?>
        $("#tahun_ajaran").val("<?=$data->tahun?>");
        $("#nama_lengkap").val("<?=$data->nama_lengkap?>");
        $("#jenis_kelamin").val("<?=$data->jenis_kelamin?>");
        $("#agama").val("<?=$data->agama?>");
        $("#tempat_lahir").val("<?=$data->tempat_lahir?>");
        <?php
        $date = new \DateTime($data->tanggal_lahir);
        $tahun =  $date->format('Y');
        $bulan =  $date->format('m');
        $tanggal =  $date->format('d');
        ?>
        $("#tahun").val(<?=$tahun?>);
        $("#bulan").val(<?=$bulan?>);
        $("#tanggal").val(<?=$tanggal?>);
        $("#alamat").val("<?=$data->alamat?>");
        $("#foto").val("<?=$data->foto?>");
        $('#preview').attr('src','/images/<?=$data->foto?>');
    <?php endif; ?>
    });
    </script>
  </body>
</html>
