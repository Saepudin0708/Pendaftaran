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
                        <h3 class="panel-title">Jurusan</h3>
                    </div>
                    <div class="panel-body">
                    <div class="alert alert-danger" role="alert" id="alert" style="display:none">
                    </div>
                        <form class="form-horizontal">
                        
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Pilih Universitas 1</label>
                                <div class="col-lg-4">
                                    <input type="text" name="universitas[]" class="form-control">
                                    <span class="error-span jurusan_error"></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="user" class="col-lg-2 control-label">Pilih Jurusan 1</label>
                                <div class="col-lg-4">
                                    <input type="text" name="jurusan[]" class="form-control">
                                    <span class="error-span jurusan_error"></span>
                                </div>
                            </div>
                            
                            <div class="form-group pilihan-baru"></div>
                                                        
                            <div class="form-group">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4">
                                    <a class="btn btn-primary" id="tambah_pilihan">Tambah Pilihan</a>
                                </div>
                            </div>
                            
                            <hr>
                            

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="new_preview"></div>
                                </div>
                                <label for="user" class="col-lg-2 control-label">Photo</label>
                                <div class="col-lg-3">
                                    <img src="/img/upload-logo-icon.png" id="preview" style="width:150px;" onclick="$('#photo').click();">
                                    <div class="progress">
                                      <div class="upload-photo-progress progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                      </div>
                                    </div>
                                </div>
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
    var index_pilihan = 1;
    $("#tambah_pilihan").click(function(){
        index_pilihan++;
        var pilihan_str = '<hr>';
        pilihan_str += '<div class="form-group">';
        pilihan_str += '<label for="user" class="col-lg-2 control-label">Pilih Universitas ' + index_pilihan + '</label>';
        pilihan_str += '<div class="col-lg-4">';
        pilihan_str += '<input type="text" name="universitas[]" class="form-control">';
        pilihan_str += '<span class="error-span jurusan_error"></span>';
        pilihan_str += '</div></div>';
        
        pilihan_str += '<div class="form-group">';
        pilihan_str += '<label for="user" class="col-lg-2 control-label">Pilih Jurusan ' + index_pilihan + '</label>';
        pilihan_str += '<div class="col-lg-4">';
        pilihan_str += '<input type="text" name="jurusan[]" class="form-control">';
        pilihan_str += '<span class="error-span jurusan_error"></span>';
        pilihan_str += '</div></div>';
        
        pilihan_str += '<div class="form-group pilihan-baru"></div>';
        if (index_pilihan <= 3) {
            $(".pilihan-baru").replaceWith(pilihan_str);
        } else {
            alert('hanya boleh 3 pilihan');
        }
        
    });
    
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
                $('#preview').attr( { 'src' : '/img/upload-logo-icon.png' } );
                var new_preview = '';
                new_preview += '<img src="/tmp/' + result.photo + '"style="width:150px; float:left">';
                new_preview += '<input type="hidden" name="photo_name[]" value="'+ result.photo +'" style="display:none">';
                new_preview += '<div class="new_preview"></div>';
                $(".new_preview").replaceWith(new_preview);
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
