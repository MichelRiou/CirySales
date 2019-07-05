<body style="background-image: none;background-color: gainsboro;">
    <div  class="container-fluid">
        <div class="wrapper">
            <header class="header mr-title" >GESTION DES INSCRITS</header>
            <div class="main main-1">
                <input class="mr-input" type ="text" id="byname" placeholder="Recherche par nom">  
            </div>
            <div class="main main-2">
                <input class="mr-input" type ="text" id="bymail" placeholder="Recherche par mail">  
            </div>
            <aside class="aside aside-1"><button id="searchCustomer" class="mr-button mr-search">Chercher</button></aside>
            <aside class="aside aside-2"><button class="mr-button mr-search">Nouveau</button></aside>
            <aside class="aside aside-3"><button id="back"class="mr-button mr-search">Retour</button></aside>

            <footer class="footer">
            </footer> 
        </div>
        <div id="addMessage"></div>
        <div id="requeteLast"></div>
        <div id="requeteFind"></div>    
    </div>
    <!-- MODAL ADD RESPONSE -->
    <div id="editCustomerModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <h5 class="modal-title">Mise à jour</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">	
                        <div class="form-group row">
                            <label for="editCivility" class="col-sm-3 col-form-label col-form-label-sm">Politesse</label>
                            <div class="col-sm-9">
                                <span class="col-sm-4"><input type="radio" name="editCivility" id="MME" value="MME">&nbsp;&nbsp;&nbsp;Mme</span>
                                <span class="col-sm-4"><input type="radio" name="editCivility" id="MLLE" value="MLLE">&nbsp;&nbsp;&nbsp;Mlle</span>
                                <span class="col-sm-4"><input type="radio" name="editCivility" id="MR" value="MR">&nbsp;&nbsp;&nbsp;Mr</span>    
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="editLastName" class="col-sm-3 col-form-label col-form-label-sm">Nom</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="editLastName" >
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="editFirstName" class="col-sm-3 col-form-label col-form-label-sm">Prénom</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="editFirstName" >
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="editAddress1" class="col-sm-3 col-form-label col-form-label-sm">Adresse</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="editAddress1" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="editAddress2" class="col-sm-3 col-form-label col-form-label-sm">-Suite-</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="editAddress2" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="editZipCode" class="col-sm-3 col-form-label col-form-label-sm">Code Postal</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="editZipCode" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="editCity" class="col-sm-3 col-form-label col-form-label-sm">Ville</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="editCity" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="editEmail" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="editEmail" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="editSMS" class="col-sm-3 col-form-label col-form-label-sm">Téléphone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="editSMS" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="editSuppression" class="col-sm-3 col-form-label col-form-label-sm">Suspension</label>
                            <div class="col-sm-9">
                                <span class="col-sm-6"><input type="radio" name="editSuppression" id="OUI" value="OUI">&nbsp;&nbsp;&nbsp;OUI</span>
                                <span class="col-sm-6"><input type="radio" name="editSuppression" id="NON" value="NON">&nbsp;&nbsp;&nbsp;NON</span> 
                            </div>
                        </div>    
                    </div>
                    <div id="editMessage" class="text-warning align-items-center"></div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" id="editCancel">
                        <input type="button" class="btn btn-success edit" value="Validation" id="editProduct">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    var idVisit;
    var idEdit;
    function updateVisit(idVisit) {
        //idVisit = this.getAttribute('value');
        console.log("text" + idVisit);
        $('#v' + idVisit).html("&#xe876;");
        // $('#v'+idVisit).style.color("orange");
        document.getElementById("v" + idVisit).className = ("material-icons delete");

    }
    function ctrlEditProduct() {
        var msg = "";
        if ($("#editCategory").val() == '0')
            msg += 'La catégorie est obligatoire.<br>';
        // Monitoring des erreurs
        $("#editMessage").html(msg);
        $result = (msg != "" ? false : true);
        return $result;
    }
    function ctrlSearch() {
        var msg = "";
        if ($("#byname").val() == '' && $("#bymail").val() == '') {
            msg += 'La sélection est obligatoire.<br>';
            document.getElementById("byname").style.backgroundColor = "orange";
            document.getElementById("byname").focus();
            document.getElementById("bymail").style.backgroundColor = "orange";
            //document.getElementById("email").focus();
        } else {
            document.getElementById("byname").style.backgroundColor = "lightblue";
            //document.getElementById("byname").focus();
            document.getElementById("bymail").style.backgroundColor = "lightblue";
        }
        // Monitoring des erreurs
        $("#addMessage").html(msg);
        $result = (msg != "" ? false : true);
        return $result;
    }

    function refresh() {
        $.ajax({
            type: 'POST',
            url: '/routes.php?action=listLastCustomer',
            data:
                    {
                        "num": 3,
                    },
            success: function (data) {
                $("#requeteLast").html(data);
                /*  $('[data-toggle="tooltip"]').tooltip();*/
                $('a[class="visit"]').click(function () {
                    idVisit = this.getAttribute('value');
                    console.log(idVisit);
                });
                /*  $("#addButton").click(function () {
                 $("#message").html('');
                 $("#addProductModal").modal('show');
                 //   } else {
                 //     $("#messageModal").modal('show');
                 // }
                 });*/
                /*   var checkbox = $('table tbody input[type="checkbox"]');
                 
                 checkbox.click(function () {
                 var s = this.checked;
                 console.log(s)
                 checkbox.each(function () {
                 this.checked = false;
                 });
                 this.checked = s;
                 });*/


                $('a[class="delete"]').click(function () {
                    idDelete = this.getAttribute('value');
                    console.log(idDelete);
                });
                $('a[class="edit"]').click(function () {
                    idEdit = this.getAttribute('editId');
                    if (this.getAttribute('editCivility') == 'MLLE')
                        document.getElementById("MLLE").checked = "checked";
                    if (this.getAttribute('editCivility') == 'MR')
                        document.getElementById("MR").checked = "checked";
                    if (this.getAttribute('editCivility') == 'MME')
                        document.getElementById("MME").checked = "checked";
                    $('#editLastName').val(this.getAttribute('editLastName'));
                    $('#editFirstName').val(this.getAttribute('editFirstName'));
                    $('#editAddress1').val(this.getAttribute('editAddress1'));
                    $('#editAddress2').val(this.getAttribute('editAddress2'));
                    $('#editZipCode').val(this.getAttribute('editZipCode'));
                    $('#editCity').val(this.getAttribute('editCity'));
                    $('#editEmail').val(this.getAttribute('editEmail'));
                    $('#editSMS').val(this.getAttribute('editSMS'));
                    if (this.getAttribute('editSuppression') == 1) {
                        document.getElementById("OUI").checked = "checked"
                    } else {
                        document.getElementById("NON").checked = "checked"
                    }
                    ;


                    /* console.log('cat' + this.getAttribute('category'));
                     var cat =this.getAttribute('category');
                     console.log('cat' + cat);
                     console.log( cat);
                     $('#editCategory').val(this.getAttribute('category')).prop('selected', true);*/
                    //  $('#editCategory').val('1').prop('selected', true);

                    console.log(idEdit);
                });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus);
                $("#retour").html("Erreur d\'envoi de la requête");
            }
        });
    }
    function search() {
        $.ajax({
            type: 'POST',
            url: '/routes.php?action=listCustomers',
            data:
                    {
                        "byName": '',
                        "byMail": '',
                    },
            success: function (data) {
                $("#requeteLast").html(data);
                $('[data-toggle="tooltip"]').tooltip();
                $("#addButton").click(function () {
                    $("#message").html('');
                    $("#addcustomerModal").modal('show');
                });
                $('a[class="delete"]').click(function () {
                    idDelete = this.getAttribute('value');
                    console.log(idDelete);
                });
                $('a[class="edit"]').click(function () {
                    idEdit = this.getAttribute('value');
                    console.log(idEdit);
                    $('#editBuilderRef').val(this.getAttribute('builder_ref'));
                    $('#editModel').val(this.getAttribute('model'));
                    $('#editRef').val(this.getAttribute('ref'));
                    $('#editBuilder').val(this.getAttribute('builder'));
                    $('#editEan').val(this.getAttribute('ean'));
                    $('#editCategory').val(this.getAttribute('cat'));
                    $('#editDesignation').val(this.getAttribute('designation'));
                    console.log(idEdit);
                });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus);
                $("#retour").html("Erreur d\'envoi de la requête");
            }
        });
    }
    $(document).ready(function () {
        refresh();
        $("#back").click(function () {
            window.history.back();
        });
        // Activate tooltip
        // $('[data-toggle="tooltip"]').tooltip();
        // Validation de la modal AJOUTER UNE REPONSE
        $("#addButton").click(function () {
            // var s = $('table tbody input:checked');
            //  if (s.length !== 0) {
            console.log(checkbox);
            $("#message").html('');
            $("#addProductModal").modal('show');
            // } else {
            //   $("#messageModal").modal('show');
            // }
        });
        $("#editButton").click(function () {
            // var s = $('table tbody input:checked');
            //  if (s.length !== 0) {
            console.log(checkbox);
            $("#message").html('');
            $("#editModal").modal('show');
            // } else {
            //   $("#messageModal").modal('show');
            // }
        });
        // Validation de la modal SUPPRIMER UNE QUESTION
        $("#deletebutton").click(function () {
            /* var s = $('table tbody input:checked');
             if (s.length !== 0) {
             /// console.log(s[0]);
             // console.log(s[0].value);
             var deleteHeader = s[0].value;*/
            $("#message").html('');
            $("#deleteQuestionModal").modal('show');
            /* } else {
             $("#messageModal").modal('show');
             }*/
        });
        // Requête AJAX pour validation
        $("#searchCustomer").on('click', (function () {
            if (ctrlSearch()) {
                $.ajax({
                    type: 'POST',
                    url: '/routes.php?action=listCustomer',
                    data:
                            {
                                "byName": $("#byname").val(),
                                "byMail": $("#bymail").val(),
                            },
                    // url: '/routes.php?action=addForm&name=' + $("#addName").val() + '&designation=' + $("#addDesignation").val() + '&category=' + $("#addCategory").val() + '&searchtype=' + $("#addSearchType").val(),
                    success: function (result) {
                        console.log(result);
                        $("#requeteFind").html(result);
                        document.getElementById("byname").value = "";
                        document.getElementById("bymail").value = "";
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                        $("#retour").html("Erreur d\'envoi de la requête");
                    }
                });
                return false;
            }
        }));
        // Requête AJAX pour validation
        $("#deleteProduct").on('click', (function () {
            if (ctrlAddProduct()) {
                $.ajax({
                    type: 'POST',
                    url: '/routes.php?action=deleteProduct&builderref=' + $("#addRefBuilder").val() + '&ref=' + $("#addRef").val() + '&model=' + $("#addModel").val() + '&builder=' + $("#addBuilder").val() + '&designation=' + $("#addDesignation").val() + '&ean=' + $("#addEan").val() + '&category=' + $("#addCategory").val(),
                    // url: '/routes.php?action=addForm&name=' + $("#addName").val() + '&designation=' + $("#addDesignation").val() + '&category=' + $("#addCategory").val() + '&searchtype=' + $("#addSearchType").val(),
                    success: function (data) {
                        console.log(data + '/routes.php?action=addProduct&builderref=' + $("#addBuilderRef").val() + '&ref=' + $("#addRef").val() + '&model=' + $("#addModel").val() + '&builder=' + $("#addBuilder").val() + '&designation=' + $("#addDesignation").val() + '&ean=' + $("#addEan").val() + '&category=' + $("#addCategory").val());
                        if (data != 1) {
                            $("#addMessage").html("Erreur d\'ajout" + data);
                        } else {
                            $('#addCancel').trigger('click');
                            refresh();
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                        $("#retour").html("Erreur d\'envoi de la requête");
                    }
                });
                return false;
            }
        }));
        // AJAX 
        $("#editProduct").on('click', (function () {
            // var next = this.getAttribute('id');
            // console.log(next);
            if (ctrlEditProduct()) {
                $.ajax({
                    type: 'POST',
                    url: '/routes.php?action=updateProduct&id=' + idEdit + '&builderref=' + $("#editBuilderRef").val() + '&ref=' + $("#editRef").val() + '&model=' + $("#editModel").val() + '&builder=' + $("#editBuilder").val() + '&designation=' + $("#editDesignation").val() + '&ean=' + $("#editEan").val() + '&category=' + $("#editCategory").val(),
                    success: function (data) {
                        console.log(data);
                        if (data == 0) {
                            $("#editMessage").html("Erreur d'insert".data);
                        } else {
                            $('#editCancel').trigger('click');
                            refresh();

                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(textStatus);
                        $("#retour").html("Erreur d\'envoi de la requête");
                    }
                });
                return false;
            }
        }
        ));
        // AJAX
        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');

        checkbox.click(function () {
            var s = this.checked;
            checkbox.each(function () {
                this.checked = false;
            });
            this.checked = s;
        });
        /* $("#addResponse").click(function () {
         // alert();
         var checkbox = $('table tbody input[type="checkbox"]');
         //alert(checkbox);
         console.log(checkbox);
         });*/
    });

</script>
