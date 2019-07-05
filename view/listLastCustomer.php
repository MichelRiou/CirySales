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
    <tr><td class="bulle" <?php if($customer->getCustomer_suppression_flag()!= 0) echo "style=color:red";?>><?= $customer->getCustomer_lastname()?><div><?= $customer->getCustomer_address1()?>&nbsp;<?= $customer->getCustomer_zipcode()?>&nbsp;<?= $customer->getCustomer_city()?></div></td>
            <td><?= $customer->getCustomer_firstname() ?></td>
            <td><?= $customer->getCustomer_email() ?></td>
            <td><?= $customer->getCustomer_sms() ?></td>
            <td><?= substr($customer->getCustomer_lastupdate(),0,10 ) ?></td>
            <td class = "row float-sm-right"> 
                <a href="#editCustomerModal" class="edit" data-toggle="modal" editId="<?= $customer->getCustomer_id() ?>" editCivility="<?= $customer->getCustomer_civility() ?>" editLastname="<?= $customer->getCustomer_lastname() ?>" editFirstName="<?= $customer->getCustomer_firstname() ?>" editAddress1="<?= $customer->getCustomer_address1() ?>" editAddress2="<?= $customer->getCustomer_address2() ?>" editZipCode="<?= $customer->getCustomer_zipcode() ?>" editCity="<?= $customer->getCustomer_city() ?> " editEmail="<?= $customer->getCustomer_email() ?> " editSMS="<?= $customer->getCustomer_sms() ?> " editSuppression="<?= $customer->getCustomer_suppression_flag() ?>"><i class="material-icons" data-toggle="tooltip" title="Editer la fiche">&#xE254;</i></a>
                <a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="javascript:updateVisit(<?= $customer->getCustomer_id() ?>)" class="visit" value="<?= $customer->getCustomer_id() ?>" ><i class="material-icons" data-toggle="tooltip" title="Enregistrer le passage" id="v<?= $customer->getCustomer_id() ?>">&#xe3c8;</i></a>
                <a href="routes.php?action=manageProductTag&id=<?= $customer->getCustomer_id() ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Liste des passages">&#xE242;</i></a>
            </td>
        </tr>
    <?php } ?> 
</tbody>
</table>
