<!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
        
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap3-editable/js/bootstrap-editable.js"></script>
   <!-- Datatables -->
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>

    <script>
        //Modal Insert Profil Pegawai
          $(document).on("click", ".open-AddBookDialog", function () {
                var myBookId = $(this).data('id');
                $(".modal-body #bookId").val( myBookId );
               $('#addBookDialog').modal('show');
           });
        //Modal Update Profil Pegawai
           $(document).on("click", ".open-AddBookDialogs", function () {
                var myBookId = $(this).data('id');
                $(".modal-body #bookIds").val( myBookId );
               $('#addBookDialogs').modal('show');
           });
        //Modal Setting Atasan
           $(document).on("click", ".open-Atasan", function () {
                var myBookId = $(this).data('id');
                $(".modal-body #idAtasan").val( myBookId );
               $('#open-Atasan').modal('show');
           });
           
        //Modal Edit Atasan
           $(document).on("click", ".open-EditAtasan", function () {
                var myBookId = $(this).data('id');
                $(".modal-body #idEditAtasan").val( myBookId );
               $('#open-EditAtasan').modal('show');
           });
           
        //Ajax Insert
        function saveToDB()
            {
                console.log('Saving to the db');
                form = $('.contact-form');
                    $.ajax({
                            url: "<?php echo base_url(); ?>Pegawai/InsertProfilPegawai",
                            type: "POST",
                            data: form.serialize(),
                            success: function (response) {
                                $("#testDIV").html(response);
                                document.location.reload();
                            },
                    });
            }
            $('.contact-form').submit(function(e) {
                    saveToDB();
                    e.preventDefault();
            });
            
//Ajax Update    
    function saveToDBs()
        {
                console.log('Saving to the db');
                form = $('.contact-forms');
                    $.ajax({
                            url: "<?php echo base_url(); ?>Pegawai/UpdateProfilPegawai",
                            type: "POST",
                            data: form.serialize(),
                            success: function (response) {
                                $("#testDIVs").html(response);
                                document.location.reload();
                            },
                    });
        }
        $('.contact-forms').submit(function(e) {
                    saveToDBs();
                    e.preventDefault();
        });

        
// Responsive Dropdown           
        function seljabatan()
        {
           var state=$('#id_unit').val();

                        $.post('<?php echo base_url();?>Pegawai/ambil_jabatan/',
                {
                        state:state

                        },
                        function(data) 
                        {

                        $('#id_jabatan').html(data);
                        });	

        }
        
        function selunitkerja()
        {
           var state=$('#id_jabatan').val();

                        $.post('<?php echo base_url();?>Pegawai/ambil_unitkerja/',
                {
                        state:state

                        },
                        function(data) 
                        {

                        $('#id_unit_kerja').html(data);
                        });	

        }
        
        function selsatuankerja()
        {
           var state=$('#id_unit_kerja').val();

                        $.post('<?php echo base_url();?>Pegawai/ambil_satuankerja/',
                {
                        state:state

                        },
                        function(data) 
                        {

                        $('#id_satuan_kerja').html(data);
                        });	

        }

// Search Pegawai
        $(document).ready(function () {
            $("#atasan").keyup(function () {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Pegawai/GetName",
                    data: {
                        nip: $("#atasan").val()
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data.length > 0) {
                            $('#DropdownCountry').empty();
                            $('#atasan').attr("data-toggle", "dropdown");
                            $('#DropdownCountry').dropdown('toggle');
                        }
                        else if (data.length == 0) {
                            $('#atasan').attr("data-toggle", "");
                        }
                        $.each(data, function (key,value) {
                            if (data.length >= 0)
                                $('#DropdownCountry').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['nama_peg'] + "#" + value['nip'] +'</a></li><input type="hidden" name"atasan" value='+ value['nip'] +' />');
                        });
                    }
                });
            });
            $('ul.txtcountry').on('click', 'li a', function () {
                $('#atasan').val($(this).text());
            });
        });
// Save Atasan Pegawai
        function saveAtasan()
        {
                console.log('Saving to the db');
                form = $('.atasan-forms');
                    $.ajax({
                            url: "<?php echo base_url(); ?>Pegawai/InsertAtasan",
                            type: "POST",
                            data: form.serialize(),
                            success: function (response) {
                                $("#testDIVatasan").html(response);
                                document.location.reload();
                            },
                    });
        }
        $('.atasan-forms').submit(function(e) {
                    saveAtasan();
                    e.preventDefault();
        });     
        
        
// Save Edit Atasan Pegawai
        function saveEditAtasan()
        {
                console.log('Saving to the db');
                form = $('.edit-atasanforms');
                    $.ajax({
                            url: "<?php echo base_url(); ?>Pegawai/UpdateAtasanPegawai",
                            type: "POST",
                            data: form.serialize(),
                            success: function (response) {
                                $("#testDIVeditatasan").html(response);
                                document.location.reload();
                            },
                    });
        }
        $('.edit-atasanforms').submit(function(e) {
                    saveEditAtasan();
                    e.preventDefault();
        });     

// Search Pegawai Edit
        $(document).ready(function () {
            $("#EditAtasanPeg").keyup(function () {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url();?>Pegawai/EditAts",
                    data: {
                        nip: $("#EditAtasanPeg").val()
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data.length > 0) {
                            $('#dropdownnama').empty();
                            $('#EditAtasanPeg').attr("data-toggle", "dropdown");
                            $('#dropdownnama').dropdown('toggle');
                        }
                        else if (data.length == 0) {
                            $('#EditAtasanPeg').attr("data-toggle", "");
                        }
                        $.each(data, function (key,value) {
                            if (data.length >= 0)
                                $('#dropdownnama').append('<li role="displayCountriess" ><a role="menuitem dropdownCountrylis" class="dropdownlivalues">' + value['nama_peg'] + "#" + value['nip'] +'</a></li><input type="hidden" name"EditAtasanPeg" value='+ value['nip'] +' />');
                        });
                    }
                });
            });
            $('ul.txtnama').on('click', 'li a', function () {
                $('#EditAtasanPeg').val($(this).text());
            });
        });
        
        
        $(function() {
            $('#row_dim').hide(); 
            $('#type').change(function(){
                if($('#type').val() == '5') {
                    $('#row_dim').show(); 
                } else {
                    $('#row_dim').hide(); 
                } 
            });
        });
    </script>
  </body>
</html>