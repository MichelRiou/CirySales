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
            <aside class="aside aside-2"><button id="addButton" class="mr-button mr-search">Nouveau</button></aside>
            <aside class="aside aside-3"><button id="back"class="mr-button mr-search">Retour</button></aside>

            <footer class="footer">
            </footer> 
        </div>
        <div id="addMessage"></div>
        <div id="requeteLast"></div>
        <div id="requeteFind"></div>    
    </div>
    <!-- MODAL ADD RESPONSE -->
    <div id="addCustomerModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">						
                        <h5 class="modal-title">Création</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">	
                        <div class="form-group row">
                            <label for="addCivility" class="col-sm-3 col-form-label col-form-label-sm">Politesse</label>
                            <div class="col-sm-9">
                                <span class="col-sm-4"><input type="radio" name="addCivility" id="addMME" value="MME">&nbsp;&nbsp;&nbsp;Mme</span>
                                <span class="col-sm-4"><input type="radio" name="addCivility" id="addMLLE" value="MLLE">&nbsp;&nbsp;&nbsp;Mlle</span>
                                <span class="col-sm-4"><input type="radio" name="addCivility" id="addMR" value="MR">&nbsp;&nbsp;&nbsp;Mr</span>    
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="addLastName" class="col-sm-3 col-form-label col-form-label-sm">Nom</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="addLastName" >
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="addFirstName" class="col-sm-3 col-form-label col-form-label-sm">Prénom</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="addFirstName" >
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label for="addAddress1" class="col-sm-3 col-form-label col-form-label-sm">Adresse</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="addAddress1" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="addAddress2" class="col-sm-3 col-form-label col-form-label-sm">-Suite-</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="addAddress2" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="addZipCode" class="col-sm-3 col-form-label col-form-label-sm">Code Postal</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="addZipCode" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="addCity" class="col-sm-3 col-form-label col-form-label-sm">Ville</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="addCity" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="addEmail" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="addEmail" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="addSMS" class="col-sm-3 col-form-label col-form-label-sm">Téléphone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control"  id ="addSMS" >
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="addSuppression" class="col-sm-3 col-form-label col-form-label-sm">Suspension</label>
                            <div class="col-sm-9">
                                <span class="col-sm-6"><input type="radio" name="addSuppression" id="addOUI" value=1>&nbsp;&nbsp;&nbsp;OUI</span>
                                <span class="col-sm-6"><input type="radio" name="addSuppression" id="addNON" value=0>&nbsp;&nbsp;&nbsp;NON</span> 
                            </div>
                        </div>    
                    </div>
                    <div id="addMessage" class="text-warning align-items-center"></div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" id="addCancel">
                        <input type="button" class="btn btn-success edit" value="Validation" id="addValid">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL EDIT RESPONSE -->
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
                                <span class="col-sm-4"><input type="radio" name="editCivility" id="editMME" value="MME">&nbsp;&nbsp;&nbsp;Mme</span>
                                <span class="col-sm-4"><input type="radio" name="editCivility" id="editMLLE" value="MLLE">&nbsp;&nbsp;&nbsp;Mlle</span>
                                <span class="col-sm-4"><input type="radio" name="editCivility" id="editMR" value="MR">&nbsp;&nbsp;&nbsp;Mr</span>    
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
                                <span class="col-sm-6"><input type="radio" name="editSuppression" id="editOUI" value=1>&nbsp;&nbsp;&nbsp;OUI</span>
                                <span class="col-sm-6"><input type="radio" name="editSuppression" id="editNON" value=0>&nbsp;&nbsp;&nbsp;NON</span> 
                            </div>
                        </div>    
                    </div>
                    <div id="editMessage" class="text-warning align-items-center"></div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" id="editCancel">
                        <input type="button" class="btn btn-success edit" value="Validation" id="editValid">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    var idVisit;
    var idEdit;
    function changeVisit(idVisit) {
        /* $('#v' + idVisit).html("&#xe876;");
                    document.getElementById("v" + idVisit).className = ("material-icons delete");*/
        $.ajax({
            type: 'POST',
            url: '/routes.php?action=updateVisit',
            data:
                    {
                        "id": idVisit,
                    },
            success: function (result) {
                console.log(result + 'id=' + idVisit);
                if (result = 1){
                    $('#v' + idVisit).html("&#xe876;");
                    document.getElementById("v" + idVisit).className = ("material-icons delete");
              }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(textStatus);
                $("#retour").html("Erreur d\'envoi de la requête visite");
            }
        });

    }
    function ctrlEditCustomer() {
        msg = '';
        document.getElementById("editLastName").style.backgroundColor = "white";
        document.getElementById("editFirstName").style.backgroundColor = "white";
        document.getElementById("editAddress1").style.backgroundColor = "white";
        document.getElementById("editZipCode").style.backgroundColor = "white";
        document.getElementById("editCity").style.backgroundColor = "white";
        document.getElementById("editEmail").style.backgroundColor = "white";
        document.getElementById("editSMS").style.backgroundColor = "white";
        if (document.querySelector('input[name="editCivility"]:checked') === null)
        {
            msg += 'Il faut choisir une politesse.<br>';
        }
        if (document.getElementById("editLastName").value.trim().length < 1)
        {
            document.getElementById("editLastName").style.backgroundColor = "orange";
            document.getElementById("editLastName").focus();
            msg += 'Le nom est obligatoire.<br>';
        }
        if (document.getElementById("editFirstName").value.trim().length < 1)
        {
            document.getElementById("editFirstName").style.backgroundColor = "orange";
            document.getElementById("editFirstName").focus();
            msg += 'Le prénom est obligatoire.<br>';
        }
        if (document.getElementById("editAddress1").value.length > 0
                || document.getElementById("editAddress2").value.length > 0
                || document.getElementById("editZipCode").value.length > 0
                || document.getElementById("editCity").value.length > 0)
        {
            if (!isAddressOk(document.getElementById("editAddress1").value, document.getElementById("editZipCode").value, document.getElementById("editCity").value)) {
                document.getElementById("editAddress1").style.backgroundColor = "orange";
                document.getElementById("editZipCode").style.backgroundColor = "orange";
                document.getElementById("editCity").style.backgroundColor = "orange";
                document.getElementById("editAddress1").focus();
                msg += 'L\'adresse n\'est pas valide.<br>';
            }
        }
        if ((document.getElementById("editEmail").value.length > 0) && (!isMailOk(document.getElementById("editEmail").value)))
        {
            document.getElementById("editEmail").style.backgroundColor = "orange";
            document.getElementById("editEmail").focus();
            msg += 'L\'email n\'est pas valable.<br>';
        }
        if ((document.getElementById("editSMS").value.length > 0) && (!isSMSOk(document.getElementById("editSMS").value)))
        {
            document.getElementById("editSMS").style.backgroundColor = "orange";
            document.getElementById("editSMS").focus();
            msg += 'Le numéro de téléphone est incorrect.<br>';
        }
        if (!isMailOk(document.getElementById("editEmail").value)) {
            document.getElementById("editEmail").style.backgroundColor = "orange";
            document.getElementById("editEmail").focus();
            msg += 'Vous devez saisir obligatoirement votre email.';
        }
        // Monitoring des erreurs
        //console.log(msg);
        /* document.getElementById("editMessage").innerHTML = msg;
         $result = (msg != "" ? false : true);
         return $result;*/
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
                });

               /* $('a[class="delete"]').click(function () {
                    idDelete = this.getAttribute('value');
                    //console.log(idDelete);
                });*/
                $('a[class="edit"]').click(function () {
                    idEdit = this.getAttribute('editId');
                    if (this.getAttribute('editCivility') == 'MLLE')
                        document.getElementById("editMLLE").checked = "checked";
                    if (this.getAttribute('editCivility') == 'MR')
                        document.getElementById("editMR").checked = "checked";
                    if (this.getAttribute('editCivility') == 'MME')
                        document.getElementById("editMME").checked = "checked";
                    $('#editLastName').val(this.getAttribute('editLastName'));
                    $('#editFirstName').val(this.getAttribute('editFirstName'));
                    $('#editAddress1').val(this.getAttribute('editAddress1'));
                    $('#editAddress2').val(this.getAttribute('editAddress2'));
                    $('#editZipCode').val(this.getAttribute('editZipCode'));
                    $('#editCity').val(this.getAttribute('editCity'));
                    $('#editEmail').val(this.getAttribute('editEmail'));
                    $('#editSMS').val(this.getAttribute('editSMS'));
                    if (this.getAttribute('editSuppression') == 1) {
                        document.getElementById("editOUI").checked = "checked"
                    } else {
                        document.getElementById("editNON").checked = "checked"
                    }
                    ;
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
                    $("#addModal").modal('show');
                });
                $('a[class="delete"]').click(function () {
                    idDelete = this.getAttribute('value');
                    //console.log(idDelete);
                });
                $('a[class="edit"]').click(function () {
                    idEdit = this.getAttribute('value');
                    //console.log(idEdit);
                    $('#editBuilderRef').val(this.getAttribute('builder_ref'));
                    $('#editModel').val(this.getAttribute('model'));
                    $('#editRef').val(this.getAttribute('ref'));
                    $('#editBuilder').val(this.getAttribute('builder'));
                    $('#editEan').val(this.getAttribute('ean'));
                    $('#editCategory').val(this.getAttribute('cat'));
                    $('#editDesignation').val(this.getAttribute('designation'));
                    //console.log(idEdit);
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
            $("#message").html('');
            $("#addCustomerModal").modal('show');
        });
        $("#editButton").click(function () {
            $("#message").html('');
            $("#editModal").modal('show');
        });

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
                        //console.log(result);
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
                        //console.log(data + '/routes.php?action=addProduct&builderref=' + $("#addBuilderRef").val() + '&ref=' + $("#addRef").val() + '&model=' + $("#addModel").val() + '&builder=' + $("#addBuilder").val() + '&designation=' + $("#addDesignation").val() + '&ean=' + $("#addEan").val() + '&category=' + $("#addCategory").val());
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
        $("#editValid").on('click', (function () {
            // var next = this.getAttribute('id');
            // console.log(next);
            if (ctrlEditCustomer()) {
                //console.log('js' + $("#editLastName").val());
                $.ajax({
                    type: 'POST',
                    url: '/routes.php?action=updateCustomer',
                    data:
                            {
                                "id": idEdit,
                                "civility": document.querySelector('input[name="editCivility"]:checked').value,
                                "lastName": $("#editLastName").val(),
                                "firstName": $("#editFirstName").val(),
                                "address1": $("#editAddress1").val(),
                                "address2": $("#editAddress2").val(),
                                "zipCode": $("#editZipCode").val(),
                                "city": $("#editCity").val(),
                                "email": $("#editEmail").val(),
                                "sms": $("#editSMS").val(),
                                "suppression": document.querySelector('input[name="editSuppression"]:checked').value
                            },
                    success: function (result) {
                        console.log(result);
                        if (result == 0) {
                            $("#editMessage").html("Erreur d'insert".result);
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
