@extends('sistem_informasi.admin.main')
@section('main')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
<div class="col-lg-12">
  <div class="card w-100">
    <div class="card-body">
      <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
          <div class="text-left mb-5">
            <span style="font-size: 15px; font-weight: bold;"><a href="/dinas">DAFTAR INSTANSI</a> / TAMBAH INSTANSI</span>
          </div>
          <form action="/submit_add_dinas" method="post" enctype="multipart/form-data" id="file-upload-form" class="uploader">
            @csrf
              <div class="formbold-steps">
                  <ul>
                      <li class="formbold-step-menu1 active">
                          <span>1</span>
                          Dinas
                      </li>
                      <li class="formbold-step-menu2">
                          <span>2</span>
                          Deskripsi
                      </li>
                      <li class="formbold-step-menu3">
                          <span>3</span>
                          Confirm
                      </li>
                  </ul>
              </div>
              <div class="formbold-form-step-1 active">
                <div class="mb-3">
                  <div>
                      <label for="dinas" class="formbold-form-label"> Instansi <strong class="text-danger font-weight-bold">*</strong> </label>
                      <input
                      type="text"
                      name="dinas"
                      placeholder="Nama Instansi"
                      id="dinas"
                      class="formbold-form-input"
                      required
                      />
                  </div>

                  <div id="error_nama_container" style="display: flex; justify-content: space-between;">
                    <span id="error_nama" class="text-danger mt-1" style="text-transform: capitalize"></span>
                    <span id="jml_input_string_container">
                      <span id="jml_input_string">0</span> 
                      / 100</span>
                  </div>

                  <div class="gambar_upload">
                    <span class="formbold-form-label mt-3"> Foto Instansi <strong class="text-danger">*</strong></span>
                    <input id="file-upload" type="file" name="file_gambar" accept="image/*" />
  
                    <label for="file-upload" id="file-drag" style="display: inline-block; margin-bottom: 20px;">
                      <img id="file-image" src="#" alt="Preview" class="hidden">
                      <div id="start">
                        <i class="fa fa-download" aria-hidden="true"></i>
                        <div>Pilih File atau Tarik File</div>
                        <div id="notimage" class="hidden">Masukkan Gambar</div>
                        <span id="file-upload-btn" class="btn btn-primary">Pilih Gambar</span>
                      </div>
                      <div id="response" class="hidden">
                        <div id="messages2"></div>
                        <progress class="progress" id="file-progress" value="0">
                          <span>0</span>%
                        </progress>
                      </div>
                    </label>
                  </div>

                  <div>
                      <label for="maps" class="formbold-form-label"> Link 3d maps  </label>
                      <input
                      type="text"
                      name="maps"
                      placeholder="Masukkan link 3D maps (opsional)"
                      id="maps"
                      class="formbold-form-input"
                      />
                  </div>
                  <div class="mb-4">
                    <label for="jenis" class="formbold-form-label mt-3">Jenis Gedung<strong class="text-danger font-weight-bold">*</strong> </label>
                    <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                      <option disabled selected>Pilih Jenis Gedung</option>
                      <option value="inst">Instansi</option>
                      <option value="lain">Fasilitas Lainnya</option>
                    </select>
                  </div>
                </div>
                <h5 class="mb-3" style="font-weight: bold;">Tipe Input Layanan</h5>
                {{-- <div class="mb-3" style="display: flex;justify-content: space-between;">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio_input" id="biasa" checked>
                    <label class="form-check-label" for="biasa">
                      Biasa
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="radio_input" id="excel">
                    <label class="form-check-label" for="excel">
                      Excel
                    </label>
                  </div>
                </div> --}}
                <div class="mb-4" id="layanan_container">
                  <div id="layananke1_container" class="mb-3">
                    <div class="mb-3">
                      <label for="layananke1" class="form-label">Layanan Ke 1</label>
                      <input type="text" class="form-control" name="layananke1" id="layananke1" placeholder="Masukkan Nama Layanan">
                    </div>
                    <div class="mb-3">
                      <label for="deskripsilayananke1" class="form-label">Deskripsi Layanan ke 1</label>
                      <textarea class="form-control" id="deskripsilayananke1" name="deskripsilayananke1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="judulGambarlayananke1" class="form-label">Judul Gambar Detail Layanan ke 1</label>
                      <input type="text" class="form-control" name="judulGambarlayananke1" id="judulGambarlayananke1" placeholder="Masukkan Nama Layanan">
                    </div>

                    <div id="error_judul_container1" style="display: flex; justify-content: space-between;margin-bottom: 10px;">
                      <span id="error_judul1" class="text-danger" style="text-transform: capitalize"></span>
                      <span id="jml_input_string_judul_container1">
                        <span id="jml_input_string_judul1">0</span> 
                        / 100</span>
                    </div>

                    <div class="gambar_upload" style="margin-bottom: 250px;">
                      <div class="file-upload_gambar" >
                        <input value="masukkan gambar" id="file-upload_gambar-btn" class="file-upload_gambar-btn" type="button"  onclick="$('.file-upload_gambar-input').trigger( 'click' )">
                        <label for="file-upload_gambar-btn">
                          <div class="image-upload-wrap">
                            <input name="file_gambar_layanan1" class="file-upload_gambar-input" type='file' onchange="readURL(this);" accept="image/*" />
                            <div class="drag-text">
                                <h3>Masukkan File Gambar</h3>
                            </div>
                          </div>
                          <div class="file-upload_gambar-content">
                            <img class="file-upload_gambar-image" src="#" alt="your image" />
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="remove-image"><span class="image-title">Uploaded Image</span></button>
                            </div>
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div id="jumlah_layanan_container" style="text-align: right;" class="mr-5 mb-3">Jumlah Layanan :  <input type="int" id="jumlah_layanan" name="jumlah_layanan" value="1" readonly style="border: none; width: 30px;"></div>
                <div id="btn_layanan_container" class="mx-auto mb-4" style="justify-content: space-between; display: flex;">
                  <button title="Hapus Layanan" style="width: 100px" class="btn btn-primary button_layanan" type="button" id="kurang_layanan">-</button>
                  <button title="Tambah Layanan" style="width: 100px" class="btn btn-primary button_layanan" type="button" id="tambah_layanan">+</button>
                </div>

                  <div id="excel_input" style="display: none;">
                    <div>
                      <ul style="list-style-type:circle">
                        <li type="none" style="border-bottom: 1px solid rgb(129, 129, 129); display:inline-block; padding-bottom:3px; margin-bottom:10px;">Ketentuan Format File</li>
                        <li>File harus dalam bentuk excel</li>
                        <li>Hanya Menulis layanan pada satu kolom pertama tiap baris</li>
                        <li><strong>Format File dapat di download <a href="/download_file_layanan" style="text-decoration: underline;">Disini</a></strong></li>
                        <li type="none"><img src="{{ asset('assets/sistem_informasi/images/layanan/ketentuan_layanan.png') }}" height="150px" width="100px" alt=""></li>
                      </ul>
                    </div>
                    <label for="layanan" class="formbold-form-label"> <strong>Tambah Layanan ( opsional )</strong></label>
                    <div class="dropzone-area">
                      <div class="file-upload-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                          </svg>
                      </div>
                      <p style="font-weight: bold">Masukkan File Untuk Menambah Layanan</p>
                      <input type="file" id="upload-file" name="file_layanan">
                      <p class="message">No Files Selected</p>
                    </div>
                  </div>
                <div class="text-center mt-5 text-danger">{{ session('error_input_dinas') }}</div>
              </div>
      
              <div class="formbold-form-step-2">
                <div>
                  <label for="deskripsi" class="formbold-form-label"> Deskripsi <strong class="text-danger font-weight-bold">*</strong> </label>
                  <textarea
                    rows="6"
                    name="deskripsi"
                    id="deskripsi"
                    placeholder="New Deskripsi"
                    class="formbold-form-input"
                    required
                  ></textarea>
                </div>
              </div>
      
              <div class="formbold-form-step-3">
                <div class="formbold-form-confirm">
                  <p>Click SUBMIT jika sudah yakin, jika belum klik <a href="/dinas">Disini</a></p>
                  <div>
                  </div>
                </div>
              </div>
              <div class="formbold-form-btn-wrapper">
                <button class="formbold-back-btn">
                  Back
                </button>
      
                <button class="formbold-btn">
                    Next Step
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1675_1807)">
                    <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_1675_1807">
                    <rect width="16" height="16" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="toastBox">
  
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      // Mengambil elemen berdasarkan ID
      var inputDinas = document.getElementById('dinas');
      var errorNama = document.getElementById('error_nama');
      var jmlInputString = document.getElementById('jml_input_string');
      var jmlInputString_container = document.getElementById('jml_input_string_container');
  
      // Fungsi untuk memperbarui jumlah karakter dan memeriksa limit
      function updateCharacterCount() {
          var length = inputDinas.value.length;
          jmlInputString.textContent = length; // Memperbarui jumlah karakter yang ditampilkan
  
          if (length > 100) {
              jmlInputString_container.style.color = "red";
              inputDinas.value = inputDinas.value.substring(0, 100); // Memotong nilai input jika lebih dari 100 karakter
              errorNama.textContent = "Maksimal 100 huruf"; // Menampilkan pesan error
          } else if (length == 100) {
              jmlInputString_container.style.color = "red";
              errorNama.textContent = "Maksimal 100 huruf"; // Menampilkan pesan error jika tepat 100 karakter
          } else {
              jmlInputString_container.style.color = "black";
              errorNama.textContent = ""; // Mengosongkan pesan error jika kurang dari 100 karakter
          }
      }
  
      // Menambahkan event listener untuk merespons setiap kali ada input
      inputDinas.addEventListener('input', updateCharacterCount);
  });

  document.addEventListener('DOMContentLoaded', function () {
      // Mengambil elemen berdasarkan ID
      var inputDinas = document.getElementById('judulGambarlayananke1');
      var errorNama = document.getElementById('error_judul1');
      var jmlInputString = document.getElementById('jml_input_string_judul1');
      var jmlInputString_container = document.getElementById('jml_input_string_judul_container1');
  
      // Fungsi untuk memperbarui jumlah karakter dan memeriksa limit
      function updateCharacterCount() {
          var length = inputDinas.value.length;
          jmlInputString.textContent = length; // Memperbarui jumlah karakter yang ditampilkan
  
          if (length > 100) {
              jmlInputString_container.style.color = "red";
              inputDinas.value = inputDinas.value.substring(0, 100); // Memotong nilai input jika lebih dari 100 karakter
              errorNama.textContent = "Maksimal 100 huruf"; // Menampilkan pesan error
          } else if (length == 100) {
              jmlInputString_container.style.color = "red";
              errorNama.textContent = "Maksimal 100 huruf"; // Menampilkan pesan error jika tepat 100 karakter
          } else {
              jmlInputString_container.style.color = "black";
              errorNama.textContent = ""; // Mengosongkan pesan error jika kurang dari 100 karakter
          }
      }
  
      // Menambahkan event listener untuk merespons setiap kali ada input
      inputDinas.addEventListener('input', updateCharacterCount);
  });

  </script>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var $wrap = $(input).closest('.gambar_upload').find('.image-upload-wrap');
            var $image = $(input).closest('.gambar_upload').find('.file-upload_gambar-image');
            var $content = $(input).closest('.gambar_upload').find('.file-upload_gambar-content');
            $wrap.hide();
            $image.attr('src', e.target.result);
            $content.show();
            $content.find('.image-title').html(input.files[0].name);
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        removeUpload(input);
    }
}

function removeUpload(input) {
    var $wrap = $(input).closest('.gambar_upload').find('.image-upload-wrap');
    var $content = $(input).closest('.gambar_upload').find('.file-upload_gambar-content');
    var $image = $(input).closest('.gambar_upload').find('.file-upload_gambar-image');
    $image.attr('src', '#'); // Menghapus src gambar
    $(input).val(''); // Menghapus nilai dari input file
    $content.hide();
    $wrap.show();
}


$('.image-upload-wrap').on('dragover', function() {
    $(this).addClass('image-dropping');
});

$('.image-upload-wrap').on('dragleave', function() {
    $(this).removeClass('image-dropping');
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var tambahButton = document.getElementById("tambah_layanan");
    var kurangButton = document.getElementById("kurang_layanan");
    var layananContainer = document.getElementById("layanan_container");
    var jumlahlayananContainer = document.getElementById("jumlah_layanan");
    var count = 1; // Untuk menghitung jumlah layanan

    // Fungsi untuk menambah layanan
    tambahButton.addEventListener("click", function() {
        count++; // Menambah jumlah layanan
        var newLayananContainer = document.createElement("div");
        newLayananContainer.id = "layananke" + count + "_container";
        newLayananContainer.classList.add("mb-3");
        newLayananContainer.innerHTML = `
            <div class="mb-3 mt-3">
                <label for="layananke${count}" class="form-label">Layanan Ke ${count}</label>
                <input type="text" class="form-control" name="layananke${count}" id="layananke${count}" placeholder="Masukkan Nama Layanan">
            </div>
            <div class="mb-3">
                <label for="deskripsilayananke${count}" class="form-label">Deskripsi Layanan ke ${count}</label>
                <textarea class="form-control" id="deskripsilayananke${count}" name="deskripsilayananke${count}" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="judulGambarlayananke${count}" class="form-label">Judul Gambar Detail Layanan ke ${count}</label>
                <input type="text" class="form-control" name="judulGambarlayananke${count}" id="judulGambarlayananke${count}" placeholder="Masukkan Nama Layanan">
            </div>

            <div id="error_judul_container${count}" style="display: flex; justify-content: space-between;margin-bottom: 10px;">
                <span id="error_judul${count}" class="text-danger" style="text-transform: capitalize"></span>
                <span id="jml_input_string_judul_container${count}">
                    <span id="jml_input_string_judul${count}">0</span> 
                / 100</span>
            </div>

            <div class="gambar_upload" style="margin-bottom: 250px;">
              <div class="file-upload_gambar">
                <input  id="file-upload_gambar-btn${count}" class="file-upload_gambar-btn" type="button"  onclick="document.getElementById('file-upload_gambar-input${count}').click()">
                <label for="file-upload_gambar-btn${count}">
                    <div class="image-upload-wrap">
                        <input name="file_gambar_layanan${count}" class="file-upload_gambar-input" id="file-upload_gambar-input${count}" type='file' onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                            <h3>Masukkan File Gambar</h3>
                        </div>
                    </div>
                    <div class="file-upload_gambar-content">
                        <img class="file-upload_gambar-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload(${count})" class="remove-image"> <span class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                </label>
              </div>
            </div>
        `;
        jumlahlayananContainer.setAttribute("value", count);
        layananContainer.appendChild(newLayananContainer);
        addLayananInput(count);
    });
    function addLayananInput(count) {
        var inputId = "judulGambarlayananke" + count;
        var errorId = "error_judul" + count;
        var jmlInputStringId = "jml_input_string_judul" + count;
        var jmlInputStringContainerId = "jml_input_string_judul_container" + count;

        // Tambahkan event listener untuk input baru
        var inputDinas = document.getElementById(inputId);
        var errorNama = document.getElementById(errorId);
        var jmlInputString = document.getElementById(jmlInputStringId);
        var jmlInputStringContainer = document.getElementById(jmlInputStringContainerId);

        inputDinas.addEventListener('input', function() {
            updateCharacterCount(inputDinas, errorNama, jmlInputString, jmlInputStringContainer);
        });
    }

    function updateCharacterCount(inputDinas, errorNama, jmlInputString, jmlInputStringContainer) {
        var length = inputDinas.value.length;
        jmlInputString.textContent = length;

        if (length > 100) {
            jmlInputStringContainer.style.color = "red";
            inputDinas.value = inputDinas.value.substring(0, 100);
            errorNama.textContent = "Maksimal 100 huruf";
        } else if (length == 100) {
            jmlInputStringContainer.style.color = "red";
            errorNama.textContent = "Maksimal 100 huruf";
        } else {
            jmlInputStringContainer.style.color = "black";
            errorNama.textContent = "";
        }
    }

    // Fungsi untuk mengurangi layanan
    kurangButton.addEventListener("click", function() {
        if (count > 1) {
            var lastLayananContainer = document.getElementById("layananke" + count + "_container");
            layananContainer.removeChild(lastLayananContainer);
            count--; // Mengurangi jumlah layanan
  
            jumlahlayananContainer.setAttribute("value", count);
        } else {
            alert("Minimal satu layanan harus ada.");
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    var biasaRadio = document.getElementById("biasa");
    var excelRadio = document.getElementById("excel");
    var layananContainer = document.getElementById("layanan_container");
    var excelInput = document.getElementById("excel_input");
    var jumlahLayananContainer = document.getElementById("jumlah_layanan_container");
    var btnLayananContainer = document.getElementById("btn_layanan_container");

    biasaRadio.addEventListener("change", function() {
        if (biasaRadio.checked) {
            layananContainer.style.display = "block";
            excelInput.style.display = "none";
            jumlahLayananContainer.style.display = "block";
            btnLayananContainer.style.display = "flex"; // Tampilkan btn_layanan_container
        }
    });

    excelRadio.addEventListener("change", function() {
        if (excelRadio.checked) {
            layananContainer.style.display = "none";
            excelInput.style.display = "block";
            jumlahLayananContainer.style.display = "none";
            btnLayananContainer.style.display = "none"; // Sembunyikan btn_layanan_container
        }
    });
});

</script>
@if ($massage = Session::get('error_toast'))
    <script>
        let box = document.getElementById('toastBox');
        let toast = document.createElement('div');

        let icon = '<i class="fa-solid fa-circle-exclamation"></i>';
        toast.classList.add('toastt');
        toast.innerHTML = icon + "{{ $massage }}";
        box.appendChild(toast);

        toast.classList.add("errortoast");
        setTimeout(() => {
            toast.remove();
        }, 3500);
    </script>
@endif
@if ($massage = Session::get('sukses_toast'))
    <script>
        let box = document.getElementById('toastBox');
        let toast = document.createElement('div');

        let icon = '<i class="fa-solid fa-circle-exclamation"></i>';
        toast.classList.add('toastt');
        toast.innerHTML = icon + "{{ $massage }}";
        box.appendChild(toast);

        toast.classList.add("errortoast");
        setTimeout(() => {
            toast.remove();
        }, 3500);
    </script>
@endif
  <style>
      .file-upload_gambar {
          background-color: #ffffff;
          width: 100%;
          margin: 0 auto;
      }
      
      .file-upload_gambar-btn {
          width: 100%;
          margin: 0;
          color: #fff;
          background: #4596ff;
          border: none;
          padding: 10px;
          border-radius: 4px;
          border-bottom: 4px solid #15824B;
          transition: all .2s ease;
          outline: none;
          text-transform: uppercase;
          font-weight: 700;
      }
      
      .file-upload_gambar-btn:hover {
          background: #4596ff;
          color: #ffffff;
          transition: all .2s ease;
          cursor: pointer;
      }
      
      .file-upload_gambar-btn:active {
          border: 0;
          transition: all .2s ease;
      }
      
      .file-upload_gambar-content {
          display: none;
          text-align: center;
      }
      
      .file-upload_gambar-input {
          position: absolute;
          margin: 0;
          padding: 0;
          width: 100%;
          height: 100%;
          outline: none;
          opacity: 0;
          cursor: pointer;
      }
      
      .image-upload-wrap {
          margin-top: 20px;
          border: 2px solid #c1c1c1;
          position: relative;
      }
      
      .image-dropping,
      .image-upload-wrap:hover {
          background-color: #3a6fff;
          border: .5px dashed #ffffff;
      }
      
      .image-title-wrap {
          padding: 0 15px 15px 15px;
          color: #222;
      }
      
      .drag-text {
          text-align: center;
      }
      
      .drag-text h3 {
        font-size: 18px;
          font-weight: 100;
          text-transform: uppercase;
          color: #000000;
          padding: 60px 0;
      }
      
      .file-upload_gambar-image {
          max-height: 200px;
          max-width: 200px;
          margin: auto;
          padding: 10px;
      }
      
      .remove-image {
          width: 200px;
          margin: 0;
          color: #fff;
          background: #cd4535;
          border: none;
          padding: 10px;
          border-radius: 4px;
          border-bottom: 4px solid #b02818;
          transition: all .2s ease;
          outline: none;
          text-transform: uppercase;
          font-weight: 700;
      }
      
      .remove-image:hover {
          background: #c13b2a;
          color: #ffffff;
          transition: all .2s ease;
          cursor: pointer;
      }
      
      .remove-image:active {
          border: 0;
          transition: all .2s ease;
      }
     @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
    @import url("https://fonts.googleapis.com/css?family=Roboto");

    .gambar_upload {
        display: block;
        clear: both;
        margin: 0 auto;
        width: 100%;
        max-width: 600px;
    }
    
    .gambar_upload label {
        float: left;
        clear: both;
        width: 100%;
        padding: 2rem 1.5rem;
        text-align: center;
        background: #fff;
        border-radius: 7px;
        border: 3px solid #eee;
        transition: all 0.2s ease;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    
    .gambar_upload label:hover {
        border-color: #454cad;
    }
    
    .gambar_upload label.hover {
        border: 3px solid #454cad;
        box-shadow: inset 0 0 0 6px #eee;
    }
    
    .gambar_upload label.hover #start i.fa {
        transform: scale(0.8);
        opacity: 0.3;
    }
    
    .gambar_upload #start {
        float: left;
        clear: both;
        width: 100%;
    }
    
    .gambar_upload #start.hidden {
        display: none;
    }
    
    .gambar_upload #start i.fa {
        font-size: 50px;
        margin-bottom: 1rem;
        transition: all 0.2s ease-in-out;
    }
    
    .gambar_upload #response {
        float: left;
        clear: both;
        width: 100%;
    }
    
    .gambar_upload #response.hidden {
        display: none;
    }
    
    .gambar_upload #response #messages2 {
        margin-bottom: 0.5rem;
    }
    
    .gambar_upload #file-image {
        display: inline;
        margin: 0 auto 0.5rem auto;
        width: auto;
        height: auto;
        max-width: 180px;
    }
    
    .gambar_upload #file-image.hidden {
        display: none;
    }
    
    .gambar_upload #notimage {
        display: block;
        float: left;
        clear: both;
        width: 100%;
    }
    
    .gambar_upload #notimage.hidden {
        display: none;
    }
    
    .gambar_upload progress,
    .gambar_upload .progress {
        display: inline;
        clear: both;
        margin: 0 auto;
        width: 100%;
        max-width: 180px;
        height: 8px;
        border: 0;
        border-radius: 4px;
        background-color: #eee;
        overflow: hidden;
    }
    
    .gambar_upload .progress[value]::-webkit-progress-bar {
        border-radius: 4px;
        background-color: #eee;
    }
    
    .gambar_upload .progress[value]::-webkit-progress-value {
        background: linear-gradient(to right, #393f90 0%, #454cad 50%);
        border-radius: 4px;
    }
    
    .gambar_upload .progress[value]::-moz-progress-bar {
        background: linear-gradient(to right, #393f90 0%, #454cad 50%);
        border-radius: 4px;
    }
    
    .gambar_upload input[type=file] {
        display: none;
    }
    
    .gambar_upload div {
        margin: 0 0 0.5rem 0;
        color: #5f6982;
    }
    
    .gambar_upload .btn {
        display: inline-block;
        margin: 0.5rem 0.5rem 1rem 0.5rem;
        clear: both;
        font-family: inherit;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        text-transform: initial;
        border: none;
        border-radius: 0.2rem;
        outline: none;
        padding: 0 1rem;
        height: 36px;
        line-height: 36px;
        color: #fff;
        transition: all 0.2s ease-in-out;
        box-sizing: border-box;
        background: #454cad;
        border-color: #454cad;
        cursor: pointer;
    }
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: "Inter", sans-serif;
    }
    :root {
    --primary: #111926;
    --white: #fff;
    --background: #F8F8FF;
    --gray: #D3D3D3;
}
.custom-bullet::before {
        content: '\2022'; /* Unicode character for a filled circle */
        color: rgb(129, 129, 129); /* Customize the color */
        display: inline-block;
        width: 1em; /* Adjust the width as needed */
        margin-right: 0.5em; /* Adjust the spacing as needed */
    }
  .dropzone-box {
    border-radius: 2rem;
    padding: 2rem;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    max-width: 36rem;
    width: 100%;
    background-color: var(--white);
}

.dropzone-box h2 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.dropzone-area {
    padding: 1rem;
    position: relative;
    margin-top: 1rem;
    min-height: 16rem;
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border: 2px dashed var(--primary);
    border-radius: 1rem;
    color: var(--primary);
    cursor: pointer;
}

.dropzone-area [type="file"] {
    cursor: pointer;
    position: absolute;
    opacity: 0;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.dropzone-area .file-upload-icon svg {
    height: 5rem;
    width: 5rem;
    margin-bottom: 0.5rem;
    stroke: var(--primary);
}

.dropzone--over {
    border-style: solid;
    background-color: var(--background);
}

.dropzone-actions {
    display: flex;
    justify-content: space-between;
    padding-top: 1.5rem;
    margin-top: 1.5rem;
    border-top: 1px solid var(--gray);
    gap: 1rem;
    flex-wrap: wrap;
}

.dropzone-actions button {
    flex-grow: 1;
    min-height: 3rem;
    font-size: 1.2rem;
}

.dropzone-actions button:hover {
    text-decoration: underline;
}

.dropzone-actions button[type='reset'] {
    background-color: transparent;
    border: 1px solid var(--gray);
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    color: var(--primary);
    cursor: pointer;
}

.dropzone-actions button[type='submit'] {
    background-color: var(--primary);
    border: 1px solid var(--primary);
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    color: var(--white);
    cursor: pointer;
}

    .formbold-main-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 50px;
    }
  
    .formbold-form-wrapper {
      margin: 0 auto;
      max-width: 550px;
      width: 100%;
      background: white;
    }
  
    .formbold-steps {
      padding-bottom: 18px;
      margin-bottom: 35px;
      border-bottom: 1px solid #3761a1;
    }
    @media(max-width: 1024px){
      .formbold-steps ul{
        flex-direction: column;
        gap: 20px;
      }
    }
    .formbold-steps ul {
      padding: 0;
      margin: 0;
      list-style: none;
      display: flex;
      gap: 40px;
    }
    .formbold-steps li {
      display: flex;
      align-items: center;
      gap: 14px;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      color: #536387;
    }
    .formbold-steps li span {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #DDE3EC;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      color: #536387;
    }
    .formbold-steps li.active {
      color: #07074D;;
    }
    .formbold-steps li.active span {
      background: #6A64F1;
      color: #FFFFFF;
    }
  
    .formbold-input-flex {
      display: flex;
      gap: 20px;
      margin-bottom: 22px;
    }
    .formbold-input-flex > div {
      width: 50%;
    }
    .formbold-form-input {
      width: 100%;
      padding: 13px 22px;
      border-radius: 5px;
      border: 1px solid #DDE3EC;
      background: #FFFFFF;
      font-weight: 500;
      font-size: 16px;
      color: #536387;
      outline: none;
      resize: none;
    }
    .formbold-form-input:focus {
      border-color: #6a64f1;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
    .formbold-form-label {
      color: #07074D;
      font-weight: 500;
      font-size: 14px;
      line-height: 24px;
      display: block;
      margin-bottom: 10px;
    }
  
    .formbold-form-confirm {
      border-bottom: 1px solid #DDE3EC;
      padding-bottom: 35px;
    }
    .formbold-form-confirm p {
      font-size: 16px;
      line-height: 24px;
      color: #536387;
      margin-bottom: 22px;
      width: 75%;
    }
    .formbold-form-confirm > div {
      display: flex;
      gap: 15px;
    }
  
    .formbold-confirm-btn {
      display: flex;
      align-items: center;
      gap: 10px;
      background: #FFFFFF;
      border: 0.5px solid #DDE3EC;
      border-radius: 5px;
      font-size: 16px;
      line-height: 24px;
      color: #536387;
      cursor: pointer;
      padding: 10px 20px;
      transition: all .3s ease-in-out;
    }
    .formbold-confirm-btn {
      box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.12);
    }
    .formbold-confirm-btn.active {
      background: #6A64F1;
      color: #FFFFFF;
    }
  
    .formbold-form-step-1,
    .formbold-form-step-2,
    .formbold-form-step-3 {
      display: none;
    }
    .formbold-form-step-1.active,
    .formbold-form-step-2.active,
    .formbold-form-step-3.active {
      display: block;
    }
  
    .formbold-form-btn-wrapper {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 25px;
      margin-top: 25px;
    }
    .formbold-back-btn {
      cursor: pointer;
      background: #FFFFFF;
      border: none;
      color: #07074D;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      display: none;
    }
    .formbold-back-btn.active {
      display: block;
    }
    .formbold-btn {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 16px;
      border-radius: 5px;
      padding: 10px 25px;
      border: none;
      font-weight: 500;
      background-color: #6A64F1;
      color: white;
      cursor: pointer;
    }
    .formbold-btn:hover {
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
    #toastBox {
    position: fixed;
    bottom: 30px;
    right: 30px;
    display: flex;
    align-items: flex-end;
    flex-direction: column;
    overflow: hidden;
    }
    
    .toastt {
    width: 300px;
    color: rgb(255, 255, 255);
    height: 80px;
    font-weight: bold;
    background: #1ec73d;
    font-weight: 500;
    font-size: 12px;
    border-top: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    box-shadow: 0 0 20px rgb(0, 0, 0, .6);
    display: flex;
    align-items: center;
    }
    
    .toastt i {
    margin: 0 20px;
    font-size: 35px;
    color: red;
    }
    
    .toastt.errortoast i {
    margin: 0 20px;
    font-size: 22px;
    color: red;
    }
    
    .toastt.sukses i {
    margin: 0 20px;
    font-size: 22px;
    color: green;
    }
    
    .toastt::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 5px;
    background: red;
    animation: anim 5s linear forwards;
    }
    
    @keyframes anim {
    100% {
        width: 0;
    }
    }
  </style>
  <script>
    function ekUpload() {
        function Init() {

            console.log("Upload Initialised");

            var fileSelect = document.getElementById('file-upload'),
                fileDrag = document.getElementById('file-drag'),
                submitButton = document.getElementById('submit-button');

            fileSelect.addEventListener('change', fileSelectHandler, false);

            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', fileDragHover, false);
                fileDrag.addEventListener('dragleave', fileDragHover, false);
                fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById('file-drag');

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
        }

        function fileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // Cancel event and hover styling
            fileDragHover(e);

            // Process all File objects
            for (var i = 0, f; f = files[i]; i++) {
                parseFile(f);
                uploadFile(f);
            }
        }

        // Output
        function output(msg) {
            // Response
            var m = document.getElementById('messages2');
            m.innerHTML = msg;
        }

        function parseFile(file) {

            console.log(file.name);
            output(
                '<strong>' + encodeURI(file.name) + '</strong>'
            );

            // var fileType = file.type;
            // console.log(fileType);
            var imageName = file.name;

            var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
            if (isGood) {
                document.getElementById('start').classList.add("hidden");
                document.getElementById('response').classList.remove("hidden");
                document.getElementById('notimage').classList.add("hidden");
                // Thumbnail Preview
                document.getElementById('file-image').classList.remove("hidden");
                document.getElementById('file-image').src = URL.createObjectURL(file);
            } else {
                document.getElementById('file-image').classList.add("hidden");
                document.getElementById('notimage').classList.remove("hidden");
                document.getElementById('start').classList.remove("hidden");
                document.getElementById('response').classList.add("hidden");
                document.getElementById("file-upload-form").reset();
            }
        }

        function setProgressMaxValue(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.max = e.total;
            }
        }

        function updateFileProgress(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.value = e.loaded;
            }
        }

        function uploadFile(file) {

            var xhr = new XMLHttpRequest(),
                fileInput = document.getElementById('class-roster-file'),
                pBar = document.getElementById('file-progress'),
                fileSizeLimit = 1024; // In MB
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= fileSizeLimit * 1024 * 1024) {
                    // Progress bar
                    pBar.style.display = 'inline';
                    xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                    xhr.upload.addEventListener('progress', updateFileProgress, false);

                    // File received / failed
                    xhr.onreadystatechange = function(e) {
                        if (xhr.readyState == 4) {
                            // Everything is good!

                            // progress.className = (xhr.status == 200 ? "success" : "failure");
                            // document.location.reload(true);
                        }
                    };

                    // Start upload
                    xhr.open('POST', document.getElementById('file-upload-form').action, true);
                    xhr.setRequestHeader('X-File-Name', file.name);
                    xhr.setRequestHeader('X-File-Size', file.size);
                    xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                    xhr.send(file);
                } else {
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById('file-drag').style.display = 'none';
        }
    }
    ekUpload();
    
    const stepMenuOne = document.querySelector('.formbold-step-menu1')
    const stepMenuTwo = document.querySelector('.formbold-step-menu2')
    const stepMenuThree = document.querySelector('.formbold-step-menu3')
  
    const stepOne = document.querySelector('.formbold-form-step-1')
    const stepTwo = document.querySelector('.formbold-form-step-2')
    const stepThree = document.querySelector('.formbold-form-step-3')
  
    const cancel = document.getElementById('cancel')
    const formSubmitBtn = document.querySelector('.formbold-btn')
    const formBackBtn = document.querySelector('.formbold-back-btn')
  
    formSubmitBtn.addEventListener("click", function(event){
      event.preventDefault()
      if(stepMenuOne.className == 'formbold-step-menu1 active') {
          event.preventDefault()
  
          stepMenuOne.classList.remove('active')
          stepMenuTwo.classList.add('active')
  
          stepOne.classList.remove('active')
          stepTwo.classList.add('active')
  
          formBackBtn.classList.add('active')
          formBackBtn.addEventListener("click", function (event) {
            event.preventDefault()
  
            stepMenuOne.classList.add('active')
            stepMenuTwo.classList.remove('active')
  
            stepOne.classList.add('active')
            stepTwo.classList.remove('active')
  
            formBackBtn.classList.remove('active')
  
          })
  
        } else if(stepMenuTwo.className == 'formbold-step-menu2 active') {
          event.preventDefault()
  
          stepMenuTwo.classList.remove('active')
          stepMenuThree.classList.add('active')
  
          stepTwo.classList.remove('active')
          stepThree.classList.add('active')
  
          formBackBtn.classList.remove('active')
          formSubmitBtn.textContent = 'Submit'
        } else if(stepMenuThree.className == 'formbold-step-menu3 active') {
          document.querySelector('form').submit()
        }
    })

    const dropzoneBox = document.getElementsByClassName("dropzone-box")[0];

    const inputFiles = document.querySelectorAll(
      ".dropzone-area input[type='file']"
    );

    const inputElement = inputFiles[0];

    const dropZoneElement = inputElement.closest(".dropzone-area");

    inputElement.addEventListener("change", (e) => {
      if (inputElement.files.length) {
        updateDropzoneFileList(dropZoneElement, inputElement.files[0]);
      }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
      e.preventDefault();
      dropZoneElement.classList.add("dropzone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
      dropZoneElement.addEventListener(type, (e) => {
        dropZoneElement.classList.remove("dropzone--over");
      });
    });

    dropZoneElement.addEventListener("drop", (e) => {
      e.preventDefault();

      if (e.dataTransfer.files.length) {
        inputElement.files = e.dataTransfer.files;

        updateDropzoneFileList(dropZoneElement, e.dataTransfer.files[0]);
      }

      dropZoneElement.classList.remove("dropzone--over");
    });

    const updateDropzoneFileList = (dropzoneElement, file) => {
      let dropzoneFileMessage = dropzoneElement.querySelector(".message");

      dropzoneFileMessage.innerHTML = `
            ${file.name}, ${file.size} bytes
        `;
    };



    dropzoneBox.addEventListener("reset", (e) => {
      let dropzoneFileMessage = dropZoneElement.querySelector(".message");

      dropzoneFileMessage.innerHTML = `No Files Selected`;
    });


    dropzoneBox.addEventListener("submit", (e) => {
      e.preventDefault();
      const myFiled = document.getElementById("upload-file");
      console.log(myFiled.files[0]);
    });
  </script>
@endsection