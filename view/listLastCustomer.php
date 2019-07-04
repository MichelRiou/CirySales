<table class="table table-hover">
    <thead>
    <div class="text-center" style="background-color: #cccccc;">Dernières mise à jour</div>
    <tr><th style="width: 17%;">Nom</th>
        <th style="width: 17%;">Prénom</th>
        <th style="width: 17%;">Email</th>
        <th style="width: 17%;">Téléphone</th>
        <th style="width: 17%;">Mise à jour</th>
        <th style="width: 15%;"   colspan="3"></th>
      </tr>
</thead>
<tbody>   
    <?php foreach ($customers as $customer) { ?>                      
        <tr><td><?= $customer->getCustomer_lastname() ?></td><td><?= $customer->getCustomer_firstname() ?></td><td><?= $customer->getCustomer_email() ?></td><td><?= $customer->getCustomer_sms() ?></td><td><?= substr($customer->getCustomer_lastupdate(),0,10 ) ?></td>
            <td class = "row float-sm-right">
                <a href="javascript:updateVisit(<?= $customer->getCustomer_id() ?>)" class="visit" value="<?= $customer->getCustomer_id() ?>" ><i class="material-icons" data-toggle="tooltip" title="Enregistrer le passage" id="v<?= $customer->getCustomer_id() ?>">&#xe3c8;</i></a>
                <a href="#editCustomerModal" value="<?= $customer->getCustomer_id() ?>" builder_ref="<?= $customer->getCustomer_id() ?>" ref="<?= $customer->getCustomer_id() ?>" model="<?= $customer->getCustomer_id() ?>" builder="<?= $customer->getCustomer_id() ?>" ean="<?= $customer->getCustomer_id() ?>" designation="<?= $customer->getCustomer_id() ?> " cat="<?= $customer->getCustomer_id() ?> " class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editer la fiche">&#xE254;</i></a>
               <a href="routes.php?action=manageProductTag&id=<?= $customer->getCustomer_id() ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Liste des passages">&#xE242;</i></a>
            </td>
        </tr>
    <?php } ?> 
</tbody>
</table>
