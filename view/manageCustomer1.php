<script type="text/javascript">
    var idDelete;
    var idEdit;
    function ctrlEditProduct() {
        var msg = "";
        if ($("#editCategory").val() == '0')
            msg += 'La catégorie est obligatoire.<br>';
        // Monitoring des erreurs
        $("#editMessage").html(msg);
        $result = (msg != "" ? false : true);
        return $result;
    }
    function ctrlAddProduct() {
        var msg = "";
        if ($("#addRefBuilder").val() == '')
            msg += 'La référence constructeur est obligatoire.<br>';
        if ($("#addCategory").val() == '0')
            msg += 'La catégorie est obligatoire.';
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
              /*  $('[data-toggle="tooltip"]').tooltip();
                $("#addButton").click(function () {
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
                    idEdit = this.getAttribute('value');
                    console.log(idEdit);
                    $('#editBuilderRef').val(this.getAttribute('builder_ref'));

                    //$('#editRef').val(this.getAttribute('ref'));
                    $('#editModel').val(this.getAttribute('model'));
                    $('#editRef').val(this.getAttribute('ref'));
                    $('#editBuilder').val(this.getAttribute('builder'));
                    $('#editEan').val(this.getAttribute('ean'));
                    $('#editCategory').val(this.getAttribute('cat'));
                    $('#editDesignation').val(this.getAttribute('designation'));
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
                $("#requete").html(data);
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
        $("#addProduct").on('click', (function () {
            if (ctrlAddProduct()) {
                $.ajax({
                    type: 'POST',
                    url: '/routes.php?action=addProduct&builderref=' + $("#addRefBuilder").val() + '&ref=' + $("#addRef").val() + '&model=' + $("#addModel").val() + '&builder=' + $("#addBuilder").val() + '&designation=' + $("#addDesignation").val() + '&ean=' + $("#addEan").val() + '&category=' + $("#addCategory").val(),
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
<div class="wrapper t">
    <header class="header mr-title t">GESTION DES CLIENTS</header>
    <div class="main main-1 t">
        <input class="mr-input" type ="text" placeholder="Recherche par nom">  
    </div>
    <div class="main main-2 t">
        <input class="mr-input" type ="text" placeholder="Recherche par mail">  
    </div>
    <aside class="aside aside-1 t"><button class="mr-button mr-search">Chercher</button></aside>
    <aside class="aside aside-2 t"><button class="mr-button mr-search">Nouveau</button></aside>
    <aside class="aside aside-3 t"><button class="mr-button mr-search">Retour</button></aside>
    <footer class="footer t">
        <table>
            <thead >
                <tr class="mr-table">
                    <th colspan="2">Dernières mise à jour</th>
                </tr>
            </thead>
            <tbody>
                <tr class="mr-table">
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Email</td>
                    <td>Telephone</td>
                    <td>Maj</td>
                    <td>D maj</td>
                    <td>Visite</td>
                </tr>
            </tbody>

        </table>
    </footer>
    <div id="requeteLast"></div>
</div>
