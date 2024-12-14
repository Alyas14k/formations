<!-- Footer Start -->
<br><br><br><br>
<div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">YALAAFI</a>, Tout droit reservé. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://me.bf">IB</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    


@yield('script')
@yield('modal')
    <!-- JavaScript Libraries -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 

    <!-- <script src="{{asset('dashmin/lib/chart/chart.min.js')}}"></script> -->
    <script src="{{asset('dashmin/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('dashmin/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('dashmin/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dashmin/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('dashmin/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('dashmin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('dashmin/js/main.js')}}"></script>

    <!-- For Datatables -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script> 
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.dataTables.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script> 
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> -->
 
<script>
    $( '.single-select' ).select2( {
      theme: "bootstrap-5",
      width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
      placeholder: $( this ).data( 'placeholder' ),
    } );
</script>
  <script>
      const exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', event => {
  // Button that triggered the modal
  const button = event.relatedTarget
  // Extract info from data-bs-* attributes
  const recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  const modalTitle = exampleModal.querySelector('.modal-title')
  const modalBodyInput = exampleModal.querySelector('.modal-body input')

  modalTitle.textContent = `Enregistrer Employer ${recipient}`
  modalBodyInput.value = recipient
})
  </script>
  <script>
// Gérer l'envoi du formulaire
document.getElementById('saveButton').addEventListener('click', function () {
  let form = document.getElementById('storeemployer');
  let formData = new FormData(form);
  //alert(formData);
  fetch('/employe/storemodal', { // Remplacez par l'URL de votre API
    method: 'POST',
    body: formData,
  })
    .then(response => response.json())
    .then(data => {
      if (data.status=='200') {
        // Fermer le modal après enregistrement
        alert('Data saved successfully!');

        // let modal = bootstrap.Modal.getInstance(document.getElementById('addemployes'));
        // modal.hide();
        $('#addemployes').modal('hide');
                document.querySelectorAll('.modal-backdrop').forEach((backdrop) => {
            backdrop.remove();
        });
      } else {
        alert('Failed to save data.');
      }
    })
    .catch(error => console.error('Error:', error));
});
</script>
    <script>
    

    function changeValue(directions, services)
          {
             //alert("okok");
              var direction_val = $("#"+directions).val();
              //var id_param = parseInt(child);
              //alert(niveau);
              var url = '#';

              $.ajax({
                      url: url,
                      type: 'GET',
                      data: {idparent_val: direction_val},
                      dataType: 'json',
                      error:function(data){alert("Erreur de données");},
                      success: function (data) {
                          var options = '<option></option>';
                          for (var x = 0; x < data.length; x++) {
                              options += '<option value="' + data[x]['id'] + '">' + data[x]['libelle'] + '</option>';
                          }
                         $('#'+services).html(options);
                      }
              });
          }

</script>
<script>
    function changeAdresse(parent, child, niveau)
          {
             // alert("okok");
              var idparent_val = $("#"+parent).val();
              var id_param = parseInt(niveau);
              //alert(niveau);

              var url = '#';

              $.ajax({
                      url: url,
                      type: 'GET',
                      data: {idparent_val: idparent_val, id_param:id_param, parent:parent},
                      dataType: 'json',
                      error:function(data){alert("Erreur");},
                      success: function (data) {
                          var options = '<option></option>';
                          for (var x = 0; x < data.length; x++) {
                              options += '<option value="' + data[x]['id'] + '">' + data[x]['name'] + '</option>';
                          }
                         $('#'+child).html(options);
                      }
              });
          }

</script>
<script>
  new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
        }
    }
});
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
    function moyens(){
    var moyen= $('.projet').val();
    if(moyen==7660){
      //alert('ok');
        $('.structure').show();
          }
        else{
        $('.structure').hide();
        }
    }
</script>
<script>
    function ModalEmploye(){
      var form = $('#addemployeh');
      alert(form);
    }

    function moyen(){
    var moyen= $('.moyen_transport').val();
    var type= $('#type_transport').val();
    
    if(moyen==7651){
      //alert(type);
        $('.vehicule_mebf').show();
        $('.vehicule_personnel').hide(); 
        $('.trans_commun').hide();    
          }
        else if(moyen==7652){
          //alert('person');
        $('.vehicule_personnel').show();
        $('.vehicule_mebf').hide();
        $('.trans_commun').hide();
        }
        else if(moyen==7653){
          //alert('person');
        $('.vehicule_personnel').hide();
        $('.vehicule_mebf').hide();
        $('.trans_commun').show();
        }
        else {
          $('.vehicule_personnel').hide();
          $('.vehicule_mebf').hide();
        
        }
        if(type==7655 || type==7656){
            $('.moyen_trans').hide();
            $('.compagnie').show();
        }
        else{
            $('.moyen_trans').show();
            $('.compagnie').hide();
        }
       
    }
    
</script>
<script>
    function changeMateriel(type,materiel)
          {
             //alert("okok");
              var id = $("#"+type).val();
              //var id_type = parseInt(type);
             var type_equipement=$('#type_materiel').val();
              //alert(type_equipement);
              if(type_equipement==7664){
                $('.ordinateur').show();
              }
              else{
                $('.ordinateur').hide();
              }

              var url = '#';

              $.ajax({
                      url: url,
                      type: 'GET',
                      data: {type_id: id},
                      dataType: 'json',
                      error:function(data){alert("Erreur");},
                      success: function (data) {
                          var options = '<option></option>';
                          for (var x = 0; x < data.length; x++) {
                              options += '<option value="' + data[x]['id'] + '">' + data[x]['bailleur'] + ' - ' + data[x]['marque'] + ' - ' + data[x]['modele'] + ' - ' + data[x]['code'] + '</option>';
                          }
                        
                         $('#'+materiel).html(options);
                      }
              });
          }
</script>
<script>
    function changeModele(marque,modele)
          {
             //alert("okok");
              var id = $("#"+marque).val();
              //salert(id);
              //var id_type = parseInt(type);
             //var type_equipement=$('#type_materiel').val();            

              var url = '#';

              $.ajax({
                      url: url,
                      type: 'GET',
                      data: {marque: id},
                      dataType: 'json',
                      error:function(data){alert("Erreur");},
                      success: function (data) {
                          var options = '<option></option>';
                          for (var x = 0; x < data.length; x++) {
                              options += '<option value="' + data[x]['id'] + '">' + data[x]['libelle'] + ' - ' + data[x]['description'] + '</option>';
                          }
                        
                         $('#'+modele).html(options);
                      }
              });
          }
</script>

<script>
    function ordinateur(){
      //alert('ordi');
      var type_equi=$('#type_equipement').val();
      if(type_equi==7664){
        $('.type_ordi').show();
      }
      else{
        $('.type_ordi').hide();
      }
    }
</script>
<script>
        document.addEventListener("DOMContentLoaded", function () {
        // Récupère l'URL actuelle
        const currentUrl = window.location.pathname;

        // Vérifie quel lien correspond à la page courante et lui ajoute la classe 'active'
        if (currentUrl.includes("affectation")) {            
            document.getElementById("menu-affect").classList.add("active");
        } else if (currentUrl.includes("attente-dg")) {
            document.getElementById("link-dg").classList.add("active");
            document.getElementById("menu-affect").classList.add("active");
        } else if (currentUrl.includes("attente-daf")) {
            document.getElementById("link-daf").classList.add("active");
            document.getElementById("menu-affect").classList.add("active");
        } else if (currentUrl.includes("attente-si")) {
            document.getElementById("link-si").classList.add("active");
            document.getElementById("menu-affect").classList.add("active");
        }
        else if (currentUrl.includes("affecter")) {
            document.getElementById("link-affecter").classList.add("active");
            document.getElementById("menu-affect").classList.add("active");
        }
        else if (currentUrl.includes("rejet")) {
            document.getElementById("link-rejet").classList.add("active");
            document.getElementById("menu-affect").classList.add("active");
        }

        // Pour la partie matériel

        if (currentUrl.includes("materiel")) {
            document.getElementById("listema").classList.add("active");
            document.getElementById("menu-materiel").classList.add("active");
        }
        else if(currentUrl.includes("okmate")){
          document.getElementById("affecterma").classList.add("active");
          document.getElementById("menu-materiel").classList.add("active");
        }

        else if(currentUrl.includes("encour")){
          document.getElementById("link-cours").classList.add("active");
          document.getElementById("menu-materiel").classList.add("active");
        }

        // Pour la partie administration

        if (currentUrl.includes("user")) {
            document.getElementById("link-user").classList.add("active");
            document.getElementById("menu-admin").classList.add("active");
        }
        else if(currentUrl.includes("role")){
          document.getElementById("link-role").classList.add("active");
          document.getElementById("menu-admin").classList.add("active");
        }
        else if(currentUrl.includes("permission")){
          document.getElementById("link-permission").classList.add("active");
          document.getElementById("menu-admin").classList.add("active");
        }
        else if(currentUrl.includes("valeur")){
          document.getElementById("link-valeur").classList.add("active");
          document.getElementById("menu-admin").classList.add("active");
        }
        else if(currentUrl.includes("parametre")){
          document.getElementById("link-parametre").classList.add("active");
          document.getElementById("menu-admin").classList.add("active");
        }
    });
</script>
<!-- <script>
    $('#detailcategorie').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Bouton qui a déclenché le modal
    var id = button.data('id'); // Récupérer la variable `data-id`


    // Mettre les valeurs dans le modal
    // var modal = $(this);
    // modal.find('#modal-id').text(id);
   // modal.find('#modal-name').text(name);

    // Placer la valeur dans l'input caché
    //$('#modal-id').val(id);
    var url = '{{ route("categorie.detail")}}';
    $.ajax({
                      url: url,
                      type: 'GET',
                      data: {id: id},
                      dataType: 'json',
                      error:function(data){alert("Erreur");},
                      success: function (data) {
                        // Mettre les valeurs dans le modal
                        //console.log(data);
                        var modal = $(this);
                        modal.find('#pays').text(data.pays);
                        $('.url').attr('src', '{{ Storage::url('') }}' + data.image);
                        $('#id').val(data.id);
                        $('.pays').val(data.pays);
                        $('.categorie').val(data.categorie);
                        $('.lien').val(data.lien);
                        $('.url').val(data.image);
                       
                      }
              });

    });
</script> -->
<script>
    $('#detailcategorie').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Bouton qui a déclenché le modal
        var id = button.data('id'); // Récupérer la variable `data-id`

        var url = '{{ route("categorie.detail") }}';
        
        $.ajax({
            url: url,
            type: 'GET',
            data: { id: id },
            dataType: 'json',
            error: function(data) {
                alert("Erreur");
            },
            success: function(data) {
                // Référence directe au modal
                var modal = $('#detailcategorie');

                // Mettre à jour les champs dans le modal
                modal.find('#pays').text(data.pays);

                // Mettre à jour la source de l'image
                modal.find('.url').attr('src', '{{ Storage::url('') }}' + data.image);

                // Mettre à jour les autres champs
                modal.find('#id').val(data.id);
                modal.find('.pays').val(data.pays);
                modal.find('.categorie').val(data.categorie);
                modal.find('.lien').val(data.lien);
                modal.find('.url').val(data.image);
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        // Le message disparaît après 5 secondes (5000 ms)
        setTimeout(function() {
            $(".custom-alert").fadeOut("slow", function() {
                $(this).remove();
            });
        }, 5000); // 5000 ms = 5 secondes
    });
</script>
</body>
</html>