<table class="table table-hover">
    <thead>
    <div class="text-center" style="background-color: lightgoldenrodyellow;">Dernières mise à jour</div>
    <tr><th style="width: 17%;">Nom</th>
        <th style="width: 17%;">Prénom</th>
        <th style="width: 17%;">Email</th>
        <th style="width: 17%;">Téléhone</th>
        <th style="width: 17%;">Visite</th>
        <th style="width: 15%;"   colspan="3"></th>
      </tr>
</thead>
<tbody>   
    <?php foreach ($customers as $customer) { ?>                      
        <tr><td><?= $customer->getCustomer_lastname() ?></td><td><?= $customer->getCustomer_firstname() ?></td><td><?= $customer->getCustomer_email() ?></td><td><?= $customer->getCustomer_sms() ?></td><td><?= $customer->getCustomer_validation() ?></td>
            <td class = "row">
                <a href="routes.php?action=manageProductTag&id=<?= $customer->getCustomer_id() ?>" class="view"><i class="material-icons" data-toggle="tooltip" title="Liste">&#xE242;</i></a>
                <a href="#editCustomerModal" value="<?= $customer->getCustomer_id() ?>" builder_ref="<?= $customer->getCustomer_id() ?>" ref="<?= $customer->getCustomer_id() ?>" model="<?= $customer->getCustomer_id() ?>" builder="<?= $customer->getCustomer_id() ?>" ean="<?= $customer->getCustomer_id() ?>" designation="<?= $customer->getCustomer_id() ?> " cat="<?= $customer->getCustomer_id() ?> " class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <a href="#deleteTagModal" value="<?= $customer->getCustomer_id() ?>"  class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a> 
            </td>
        </tr>
    <?php } ?> 
</tbody>
</table>
