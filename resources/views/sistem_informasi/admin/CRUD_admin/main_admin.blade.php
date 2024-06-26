@extends("sistem_informasi.admin.main")
@section('main')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-IYF3A/b5QDsjjr6f5lC7PgeVojOO0GW7R+EiAtkdbY//SWEZDtQqFJ9C1STh0pcHp1K5V02LFQKZ1KGHTtL54A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/sistem_informasi/table/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

    <style>
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
    #searchEmail::placeholder {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #888;
        opacity: 1;
        padding-left: 5px;
    }
    </style>
</head>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> --}}

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="text-left mb-3">
                <span style="font-size: 20px; font-weight: bold;color: rgb(43, 75, 255);margin-left: 14px">Akun / Daftar Admin</span>
            </div>
            <div class="text-right mr-3 mb-3">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal"  data-bs-target="#staticBackdrop"><i class="fa fa-plus"></i> <span class="d-inline-block ml-3">Tambah Admin</span></button>
            </div>
           {{-- POP UP ADD ADMIN --}}
           <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Admin</h5>
                    </div>
                    <form action="/add/admin" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username">User Name : <strong class="text-danger font-weight-bold">*</strong></label>
                                <input id="username" type="text" class="form-control" placeholder="User Name" required name="username">
                            </div>
                            <div id="error_username_container" style="display: flex; justify-content: space-between;margin-top: 10px;">
                                <span id="error_username" class="text-danger mt-1" style="text-transform: capitalize"></span>
                                <span id="jml_input_username_container">
                                  <span id="jml_input_username">0</span> 
                                  / 50</span>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Admin : <strong class="text-danger font-weight-bold">*</strong></label>
                                <input id="nama" type="text" class="form-control" placeholder="Nama Admin" required name="nama_admin">
                            </div>
                            <div id="error_nama_container" style="display: flex; justify-content: space-between;margin-top: 10px;">
                                <span id="error_nama" class="text-danger mt-1" style="text-transform: capitalize"></span>
                                <span id="jml_input_nama_container">
                                  <span id="jml_input_nama">0</span> 
                                  / 50</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email : <strong class="text-danger font-weight-bold">*</strong></label>
                                <input id="email" type="email" class="form-control" placeholder="Email Admin" required name="email">
                            </div>
                            <div id="error_email_container" style="display: flex; justify-content: space-between;margin-top: 10px;">
                                <span id="error_email" class="text-danger mt-1" style="text-transform: capitalize"></span>
                                <span id="jml_input_email_container">
                                  <span id="jml_input_email">0</span> 
                                  / 100</span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password : <strong class="text-danger font-weight-bold">*</strong></label>
                                <input id="password" type="password" class="form-control" placeholder="Password" required name="password">
                            </div>
                        </div>
                        <div class="modal-footer" style="text-align: center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- END POP UP --}}
        <div class="col-lg-12 d-flex align-items-strech mb-4">
            <div class="w-100">
                <div style="">
                    <input  style="border-radius: 50px;" type="text" class="form-control text-center" placeholder="&#xf002;   Cari Email" id="searchEmail">
                </div>
            </div>
        </div>
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <table class="table" id="usersTable">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>No <button style="border: none; background: transparent;" onclick="sortTable()"><i class="fa fa-sort text-light ml-2"></i></button></th>
                                            <th>Email</th>
                                            <th>Username <button style="border: none; background: transparent;" onclick="sortTableName()"><i class="fa fa-sort text-light ml-2"></i></button></th>
                                            <th>Nama Admin<br>
                                            {{-- <th>Role<br> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $userss )
                                        <tr>
                                            <th scope="row" class="scope" width="100px">{{ $loop->iteration }}</th>
                                            <td class="text-center" width="150px">{{ $userss->email }}</td>
                                            <td class="text-justify" style="width: 200px;">{{ $userss->username }}</td>
                                            <td class="text-justify" style="width: 200px;">{{ $userss->nama_admin }}</td>
                                            {{-- <td class="text-center" style="width: 260px;">{{ $userss->role }}</td> --}}
                                            {{-- <td class="text-center" style="width: 150px;">{{ $userss->status }}</td> --}}
                                            <td style="width: 300px">
                                                {{-- <a href={{ route('delete_admin' , ['id' => $userss->id]) }} class="d-inline-block" style="margin-right:28px;" title="delete" name="delete">
                                                    <i style="font-size: 20px" class="fa fa-trash"></i>
                                                </a> --}}
                                                <button style="border: none; background: transparent; color: red;" onclick="showDeleteConfirmation( '{{$userss->id }}' )" class="d-inline-block" style="margin-right:28px;" title="delete" name="delete">
                                                    <i style="font-size: 20px" class="fa fa-trash"></i>
                                                </button>

                                                <a href={{route('edit_admin' ,['id' => $userss->id ])}} class="d-inline-block ml-5" title="edit" name="edit">
                                                    <i class="fa fa-pencil" style="font-size: 20px"></i>
                                                </a>
                                            </td>                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex" style="justify-content: space-between">
            <i class="fa fa-arrow-left ml-5  btn-arrow" id="prev-page" style="font-size: 30px"></i>
            <div></div>
            <i class="fa fa-arrow-right mr-5  btn-arrow" id="next-page" style="font-size: 30px"></i>
        </div>
    </section>
    <div id="toastBox">
    </div>

<!-- Script JavaScript -->
<script>
    // batas huruf nama admin
    document.addEventListener('DOMContentLoaded', function () {
      // Mengambil elemen berdasarkan ID
      var inputDinas = document.getElementById('nama');
      var errorNama = document.getElementById('error_nama');
      var jmlInputString = document.getElementById('jml_input_nama');
      var jmlInputString_container = document.getElementById('jml_input_nama_container');
  
      // Fungsi untuk memperbarui jumlah karakter dan memeriksa limit
      function updateCharacterCount() {
          var length = inputDinas.value.length;
          jmlInputString.textContent = length; // Memperbarui jumlah karakter yang ditampilkan
  
          if (length > 50) {
              jmlInputString_container.style.color = "red";
              inputDinas.value = inputDinas.value.substring(0, 50); // Memotong nilai input jika lebih dari 50 karakter
              errorNama.textContent = "Maksimal 50 huruf"; // Menampilkan pesan error
          } else if (length == 50) {
              jmlInputString_container.style.color = "red";
              errorNama.textContent = "Maksimal 50 huruf"; // Menampilkan pesan error jika tepat 50 karakter
          } else {
              jmlInputString_container.style.color = "black";
              errorNama.textContent = ""; // Mengosongkan pesan error jika kurang dari 50 karakter
          }
      }
  
      // Menambahkan event listener untuk merespons setiap kali ada input
      inputDinas.addEventListener('input', updateCharacterCount);
  });
    // batas huruf username admin
    document.addEventListener('DOMContentLoaded', function () {
      // Mengambil elemen berdasarkan ID
      var inputDinas = document.getElementById('username');
      var errorNama = document.getElementById('error_username');
      var jmlInputString = document.getElementById('jml_input_username');
      var jmlInputString_container = document.getElementById('jml_input_username_container');
  
      // Fungsi untuk memperbarui jumlah karakter dan memeriksa limit
      function updateCharacterCount() {
          var length = inputDinas.value.length;
          jmlInputString.textContent = length; // Memperbarui jumlah karakter yang ditampilkan
  
          if (length > 50) {
              jmlInputString_container.style.color = "red";
              inputDinas.value = inputDinas.value.substring(0, 50); // Memotong nilai input jika lebih dari 50 karakter
              errorNama.textContent = "Maksimal 50 huruf"; // Menampilkan pesan error
          } else if (length == 50) {
              jmlInputString_container.style.color = "red";
              errorNama.textContent = "Maksimal 50 huruf"; // Menampilkan pesan error jika tepat 50 karakter
          } else {
              jmlInputString_container.style.color = "black";
              errorNama.textContent = ""; // Mengosongkan pesan error jika kurang dari 50 karakter
          }
      }
  
      // Menambahkan event listener untuk merespons setiap kali ada input
      inputDinas.addEventListener('input', updateCharacterCount);
  });
    // batas huruf email admin
    document.addEventListener('DOMContentLoaded', function () {
      // Mengambil elemen berdasarkan ID
      var inputDinas = document.getElementById('email');
      var errorNama = document.getElementById('error_email');
      var jmlInputString = document.getElementById('jml_input_email');
      var jmlInputString_container = document.getElementById('jml_input_email_container');
  
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
              errorNama.textContent = ""; // Mengosongkan pesan error jika kurang dari 50 karakter
          }
      }
  
      // Menambahkan event listener untuk merespons setiap kali ada input
      inputDinas.addEventListener('input', updateCharacterCount);
  });
    // Fungsi untuk menampilkan SweetAlert
    function showDeleteConfirmation(userId) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Peringatan",
            text: "Hapus admin ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Setuju",
            cancelButtonText: "Batal",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Panggil fungsi deleteAdmin dengan parameter userId
                deleteAdmin(userId);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Peringatan",
                    text: "Admin gagal dihapus",
                    icon: "error"
                });
            }
        });
    }

    // Fungsi untuk menghapus admin
    
    function deleteAdmin(userId) {
        $.ajax({
            url: '/delete/admin/' + userId,
            // console.log(url);
            type: 'GET',
            success: function (response) {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success"
                    },
                    buttonsStyling: false
                });
                if (response.error_delete) {
                    console.error("Error deleting admin:", response.error_delete);
                    // Menampilkan pesan kesalahan
                    swalWithBootstrapButtons.fire({
                        title: "Peringatan!",
                        text: response.error_delete,
                        icon: "error"
                    });
                } else {
                    // Menampilkan pesan sukses
                    swalWithBootstrapButtons.fire({
                        title: "Data Berhasil Dihapus!",
                        text: response.sukses_delete,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                }
            },
            error: function (error) {
                console.error("Error deleting admin:", error);
            }
        });
    }
</script>

    @if (session('sukses_add'))
        <script>
            Swal.fire({
            title: "Berhasil menambah data",
            icon: "success"
            });
        </script>
    @endif
    @if (session('error_add'))
        <script>
            Swal.fire({
            title: "{{session('error_add')}}",
            icon: "error"
            });
        </script>
    @endif
    @if (session('sukses_delete'))
        <script>
            
            Swal.fire({
            title: "Berhasil menghapus data",
            icon: "success"
            });
        </script>
    @endif
    @if (session('error_delete'))
        <script>
            Swal.fire({
            title: "{{ session('error_delete') }}",
            icon: "error"
            });
        </script>
    @endif
    @if (session('sukses_edit'))
        <script>
            Swal.fire({
            title: "Data berhasil diubah",
            icon: "success"
            });
        </script>
    @endif
    @if (session('error_edit'))
        <script>
            Swal.fire({
            title: "Data gagal diubah",
            icon: "error"
            });
        </script>
    @endif


    @if ($massage = Session::get('error_toast'))
        <script>
            let box = document.getElementById('toastBox');
            let toast = document.createElement('div');

            let icon = '<i class="fa-solid fa-circle-exclamation"></i>';
            toast.classList.add('toastt');
            toast.innerHTML = icon + "{{ $massage }}";
            box.appendChild(toast);

            toast.classList.add("errortoast");
            let toastt = document.querySelector('.toastt');
            toastt.style.backgroundColor = "red";
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
            let toastt = document.querySelector('.toastt');
            toastt.style.backgroundColor = "#38ff5d";
            setTimeout(() => {
                toast.remove();
            }, 3500);
        </script>
    @endif
    {{-- search email --}}
    <script>
        // untuk sesuai email
        document.addEventListener('DOMContentLoaded', function () {
        var searchEmailInput = document.getElementById('searchEmail');
        var usersTable = document.getElementById('usersTable');
        var rows = usersTable.getElementsByTagName('tr');

        searchEmailInput.addEventListener('input', function () {
            var filter = searchEmailInput.value.toLowerCase();

            for (var i = 1; i < rows.length; i++) {
                var emailColumn = rows[i].getElementsByTagName('td')[0];

                if (emailColumn) {
                    var emailText = emailColumn.textContent || emailColumn.innerText;

                    if (emailText.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        });
    });
    // search sesuai email dan username
    // document.addEventListener('DOMContentLoaded', function () {
    //     var searchEmailInput = document.getElementById('searchEmailInput');
    //     var usersTable = document.getElementById('usersTable');
    //     var rows = usersTable.getElementsByTagName('tr');

    //     searchEmailInput.addEventListener('input', function () {
    //         var filter = searchEmailInput.value.toLowerCase();

    //         for (var i = 1; i < rows.length; i++) { // Mulai dari indeks 1 untuk melewati baris header
    //             var emailColumn = rows[i].getElementsByTagName('td')[1]; // Kolom email
    //             var usernameColumn = rows[i].getElementsByTagName('td')[2]; // Kolom username

    //             if (emailColumn && usernameColumn) {
    //                 var emailText = emailColumn.textContent || emailColumn.innerText;
    //                 var usernameText = usernameColumn.textContent || usernameColumn.innerText;

    //                 // Mencocokkan filter dengan email atau username
    //                 if (emailText.toLowerCase().indexOf(filter) > -1 || usernameText.toLowerCase().indexOf(filter) > -1) {
    //                     rows[i].style.display = ''; // Menampilkan baris jika sesuai dengan filter
    //                 } else {
    //                     rows[i].style.display = 'none'; // Menyembunyikan baris jika tidak sesuai dengan filter
    //                 }
    //             }
    //         }
    //     });
    // });
    </script>
    <script>
        let ascendingOrder = true;
    
        function sortTable() {
            const table = document.getElementById('usersTable');
            const rows = Array.from(table.getElementsByTagName('tr')).slice(1); // Exclude the header row
    
            rows.sort((a, b) => {
                const valueA = parseInt(a.cells[0].textContent);
                const valueB = parseInt(b.cells[0].textContent);
    
                if (ascendingOrder) {
                    return valueA - valueB;
                } else {
                    return valueB - valueA;
                }
            });
    
            // Update the table with the sorted rows
            rows.forEach(row => table.tBodies[0].appendChild(row));
    
            // Toggle sorting order and update the sort icon
            ascendingOrder = !ascendingOrder;
            const sortIcon = document.getElementById('sortIcon');
            sortIcon.className = ascendingOrder ? 'fa fa-sort-asc text-light ml-2' : 'fa fa-sort-desc text-light ml-2';
        }

        function sortTableName() {
            const table = document.getElementById('usersTable');
            const rows = Array.from(table.getElementsByTagName('tr')).slice(1); // Exclude the header row

            rows.sort((a, b) => {
                const valueA = a.cells[2].textContent.trim().toLowerCase().charAt(0); // Huruf pertama dari Username
                const valueB = b.cells[2].textContent.trim().toLowerCase().charAt(0); // Huruf pertama dari Username

                if (ascendingOrder) {
                    return valueA.localeCompare(valueB);
                } else {
                    return valueB.localeCompare(valueA);
                }
            });

            // Update the table with the sorted rows
            rows.forEach(row => table.tBodies[0].appendChild(row));

            // Toggle sorting order and update the sort icon
            ascendingOrder = !ascendingOrder;
            const sortIcon = document.getElementById('sortIcon');
            sortIcon.className = ascendingOrder ? 'fa fa-sort-asc text-light ml-2' : 'fa fa-sort-desc text-light ml-2';
        }
    </script>

    <script src="{{asset('assets/sistem_informasi/table/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/sistem_informasi/table/js/popper.js')}}"></script>
    <script src="{{asset('assets/sistem_informasi/table/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/sistem_informasi/table/js/main.js')}}"></script>
    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Set the number of rows to display per page
        var rowsPerPage = 5;

        // Hide all rows beyond the specified limit
        $('tbody tr').hide();
        $('tbody tr:lt(' + rowsPerPage + ')').show();

        // Add pagination controls
        var currentPage = 1;
        var totalRows = $('tbody tr').length;
        var totalPages = Math.ceil(totalRows / rowsPerPage);

        // Display pagination controls
        function displayPaginationControls() {
            $('#pagination-controls').html('Page ' + currentPage + ' of ' + totalPages);
        }

        displayPaginationControls();

        // Handle next button click
        $('#next-page').on('click', function () {
            if (currentPage < totalPages) {
                $('tbody tr').hide();
                var start = (currentPage * rowsPerPage);
                var end = start + rowsPerPage;
                $('tbody tr').slice(start, end).show();
                currentPage++;
                displayPaginationControls();
            }
        });

        // Handle previous button click
        $('#prev-page').on('click', function () {
            if (currentPage > 1) {
                currentPage--;
                var start = ((currentPage - 1) * rowsPerPage);
                var end = start + rowsPerPage;
                $('tbody tr').hide();
                $('tbody tr').slice(start, end).show();
                displayPaginationControls();
            }
        });
    });
</script>
<script>
    var staticBackdrop = document.getElementById('staticBackdrop')
    staticBackdrop.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var dataId = button.getAttribute('data-id')
        // Mengisi placeholder pada data dengan data sesuai dengan ID dari data yang di klik
        var nama = exampleModal.querySelector('.nama input')
        var jabatan = exampleModal.querySelector('.jabatan input')
        var sip = exampleModal.querySelector('.sip input')
        var tanggal_buat_sip = exampleModal.querySelector('.tanggal_buat_sip input')
        var exp_sip = exampleModal.querySelector('.exp_sip input')
        nama.value = dataId.nama
        jabatan.value = dataId.jabatan
        sip.value = dataId.sip
        tanggal_buat_sip.value = dataId.tanggal_buat_sip
        exp_sip.value = dataId.exp_sip
    })
</script>

</body>

</html>
@endsection