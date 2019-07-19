<script type="text/javascript">
/**
 * 
 * FICHIER DES FONCTIONS JAVASCRIPT / JQUERY COMMUNES
 */
/**
 * 
 * FONCTION DE RECHERCHE DANS UN TABLEAU HTML
 */
var msg = '';
function checkMail()
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(document.getElementById("email").value.toLowerCase());
}
function checkSms() {
    var re = /^0[6-7][0-9]{8}$/;
    return re.test(document.getElementById("sms").value);
}
function checkZipcode() {
    var re = /^[0-9]{5}$/;
    return re.test(document.getElementById("pos").value);
}
function checkAddress() {
    if ((document.getElementById("ad1").value.length > 1) && (document.getElementById("ville").value.length > 1) && checkZipcode())
    {
        return true;
    } else {
        return false;
    }
}
function verif_form()
            {
                msg = '';
                document.getElementById("nom").style.backgroundColor = "white";
                document.getElementById("prenom").style.backgroundColor = "white";
                document.getElementById("pos").style.backgroundColor = "white";
                document.getElementById("email").style.backgroundColor = "white";
                document.getElementById("sms").style.backgroundColor = "white";
                document.getElementById("ad1").style.backgroundColor = "white";
                document.getElementById("ville").style.backgroundColor = "white";

                if (document.getElementById("nom").value.trim().length < 1)
                {
                    document.getElementById("nom").style.backgroundColor = "orange";
                    document.getElementById("nom").focus();
                    msg += 'Le nom est obligatoire.<br>';
                }
                if (document.getElementById("prenom").value.trim().length < 1)
                {
                    document.getElementById("prenom").style.backgroundColor = "orange";
                    document.getElementById("prenom").focus();
                    msg += 'Le prénom est obligatoire.<br>';
                }
                if ((document.getElementById("sus")== null) || (!document.getElementById("sus").checked)){
                if (document.getElementById("ad1").value.length > 0
                        || document.getElementById("ad2").value.length > 0
                        || document.getElementById("pos").value.length > 0
                        || document.getElementById("ville").value.length > 0)
                       
                {
                    if (!checkAddress()) {
                        document.getElementById("ad1").style.backgroundColor = "orange";
                        document.getElementById("ville").style.backgroundColor = "orange";
                        document.getElementById("pos").style.backgroundColor = "orange";
                        document.getElementById("ad1").focus();
                        msg += 'L\'adresse n\'est pas valide.<br>';
                    }
                }
                if ((document.getElementById("email").value.length > 0) && (!checkMail()))
                {
                    document.getElementById("email").style.backgroundColor = "orange";
                    document.getElementById("email").focus();
                    msg += 'L\'email ne semble pas valide.<br>';
                }
                if ((document.getElementById("sms").value.length > 0) && (!checkSms()))
                {
                    document.getElementById("sms").style.backgroundColor = "orange";
                    document.getElementById("sms").focus();
                    msg += 'Le numéro de téléphone est incorrect.<br>';
                }


                if (!checkMail() && !checkSms() && !checkAddress()) {
                      document.getElementById("ad1").style.backgroundColor = "orange";
                    document.getElementById("sms").style.backgroundColor = "orange";
                    document.getElementById("email").style.backgroundColor = "orange";
                    document.getElementById("email").focus();
                  
                    
                    msg += 'Vous devez saisir soit un email, un numéro de portable ou une adresse complète.';
                }

                }
                if (msg == '') {
                    return true;
                } else
                {
                    console.log(message);
                    document.getElementById("message").innerHTML = msg;
                    return false;
                }

            }
</script>
<?php
echo ('toto');
include("controller\connect.inc.php");
$choix = 0;
if (filter_input(INPUT_POST, 'select_nom') !== null and ( filter_input(INPUT_POST, 'select_nom') <> '')) {
    $savnom = filter_input(INPUT_POST, 'select_nom');
    $savmail = '';
    $result = $db->prepare('SELECT * FROM customers WHERE customer_lastname LIKE :QN1 ORDER BY customer_lastname');
    $result->execute(array(':QN1' => filter_input(INPUT_POST, 'select_nom') . '%'));
    $result2 = $db->prepare('SELECT * FROM customers WHERE customer_lastname = :QN1 ORDER BY customer_lastname');
    $result2->execute(array(':QN1' => filter_input(INPUT_POST, 'select_nom')));
    $choix = 1;
} else {
    if (filter_input(INPUT_POST, 'select_email')!== null and filter_input(INPUT_POST, 'select_email') <> '') {
        $savmail = filter_input(INPUT_POST, 'select_email');
        $savnom = '';
        $result = $db->prepare('SELECT * FROM customers WHERE customer_email LIKE :QM1 ');
        $result->execute(array(':QM1' => '%' . filter_input(INPUT_POST, 'select_email') . '%'));
        $result2 = $db->prepare('SELECT * FROM customers WHERE customer_email = :QM1 ');
        $result2->execute(array(':QM1' => filter_input(INPUT_POST, 'select_email')));
        $choix = 2;
    } else {
        if (filter_input(INPUT_POST, 'R') == 'Nouveau') {
            $savnom = '';
            $savmail = '';
            $result = $db->query('SELECT * FROM customers WHERE 1=2');
            $result2 = $db->query('SELECT * FROM customers WHERE 1=2');
            $choix = 3;
        }
    }
}
$result3 = $db->prepare('SELECT * FROM customers ORDER BY customer_lastupdate DESC LIMIT 3');
$result3->execute();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style_VC6.css" />
        <title>MISE A JOUR FICHIER MAILING</title>
        <script type="text/javascript" language="javascript" src="common.js"></script>
    </head>
    <body bgcolor="#FFFFFF" text=black onload="document.getElementById('RI').focus()">
        <div align="center" style="background-color:#FFFFFF">
            <form name="formulaire" action="maj_membres.php" autocomplete="off" method="post">
                <table class="listing">
                    <caption style="background-color:#FFFFAA">MISE A JOUR FICHIER MAILING</caption>
                    <tr><th class="TD0">PAR NOM</th><th class="TD0">PAR MAIL</th><th class="TD0"><input type="hidden" name="flag" value="ok"></th></tr>
                    <tr><td class="TD0"><input class="text" id="RI" type="text" name="select_nom"></td>
                        <td class="TD0"><input class="text" type="text" name="select_email"></td>
                        <td class="TD0"><input class="bouton1" type="submit" name="R" value="Rechercher"><input class="bouton1" type="submit" name="R" value="Nouveau"></td></tr>
                </table>
            </form>
        </div>
        <?php
        if ($choix <> 0) {
            ?>
            <?php
            $nb = $result2->Rowcount(); /* Rowcount A VOIR */
            $nb3 = $result3->Rowcount(); /* Rowcount A VOIR */

            if ($nb == 0 || $choix == 3) {
                ?>
                <div style="background-color:#C3C3C3">
                    <form name="form4" action="maj3_membres.php" autocomplete="off" method="post" onSubmit="return verif_form()">
                        <table class="listing">
                            <caption style="background-color:#FFFFAA">CREATION</caption>
                            <tr>
                                <th class="TD0"><span><input type="radio" name="pol" value="Mme" checked="checked">Mme</span>
                                    <span><input type="radio" name="pol" value="Mle">Mlle</span>
                                    <span><input type="radio" name="pol" value="Mr">Mr</span></th>
                                <th class="TD0"></th>
                                <th class="TD0"></th>
                                <th class="TD1"></th>
                                <th class="TD2"></th>
                                <th class="TD2"></th>
                            </tr>
                            <tr>
                                <th class="TD0">Nom</th>
                                <th class="TD0">Prénom</th>
                                <th class="TD0">E-mail</th>
                                <th class="TD1">SMS</th>
                                <th class="TD2">Code postal</th>
                                <th class="TD2">Taille</th>
                            </tr>
                            <tr>
                                <td class="TD0"><input class="text" type="text"  size="50" maxlength="50" name="nom" id="nom" value="<?php echo htmlspecialchars($savnom) ?>" autofocus></td>
                                <td class="TD0"><input class="text" type="text" size="50" maxlength="50" id="prenom" name="prenom"></td>
                                <td class="TD0"><input class="text" type="text" id="email" name="email" value="<?php echo htmlspecialchars($savmail) ?>"></td>
                                <td class="TD1"><input class="text" placeholder="ex: 0612345678" type="text" size="10" maxlength="10" id="sms" name="sms"></td>
                                <td class="TD2"><input class="text" placeholder="ex: 03120" type="text" size="5" maxlength="5" id="pos" name="pos"></td>
                                <td class="TD2"><input class="text" type="text" size="5" maxlength="5" id="taille" name="taille"></td>
                            </tr>
                            <tr>
                                <th class="TD0">Adresse</th>
                                <th class="TD0">Suite adresse</th>
                                <th class="TD0">Ville</th>
                                <th class="TD1">Visite</th>
                                <th colspan=2 class="TD1"></th>
                            </tr>
                            <tr><td class="TD0"><input class="text" type="text" size="50" maxlength="50" id="ad1" name="ad1"></td>
                                <td class="TD0"><input class="text" type="text" size="50" maxlength="50" id="ad2" name="ad2"></td>
                                <td class="TD0"><input class="text" type="text" size="30" maxlength="30" id="ville" name="ville"></td>
                                <td class="TD1">Aujourd'hui<input type="checkbox" name="visite" value="checked"></td>
                                <td colspan=2 class="TD1"><input class="bouton1" type="submit" value="Créer"><input type="hidden" name="type" value="I"><input type="hidden" name="id" value="0"></td>
                            </tr>
                            <tr><td colspan="6"><div id='message' ></div></td></tr>
                        </table>
                    </form>
                </div>
                <?php
            } else {
                ?>
                <table class="listing">
                    <caption style="background-color:#FFFFAA">Recherche par Nom</caption>
                    <tr><th class="TD0">Nom</th><th class="TD0">Prénom</th><th class="TD0">E-mail</th><th class="TD1">SMS</th><th class="TD1">Visite</th><th class="TD1"></tr>
                    <?php
                    while ($data = $result2->fetch()) {
                        ?>
                        <tr><td class="TD0" <?php if ($data['customer_suppression_flag'] <> 0) echo ('style="color:red"') ?>><?php echo nl2br(htmlspecialchars(strtoupper($data['customer_lastname']))) ?><div class="bulle"><?php echo nl2br(htmlspecialchars(strtoupper($data['customer_address1']))); ?> &nbsp; <?php echo nl2br(htmlspecialchars(strtoupper($data['customer_zipcode']))); ?> &nbsp; <?php echo nl2br(htmlspecialchars(strtoupper($data['customer_country']))) ?></div></td>
                            <td class="TD0"><?php echo nl2br(htmlspecialchars(strtoupper($data['customer_firstname']))) ?></td>
                            <td class="TD0"><?php echo nl2br(htmlspecialchars($data['customer_email'])) ?></td>
                            <td class="TD0"><?php echo nl2br(htmlspecialchars($data['customer_sms'])) ?></td>
                            <td class="TD1"><?php echo $data['customer_last_visit'] ?></td>
                            <td class="TD1"><input type="button" value="Maj" class="bouton1" onclick="self.location.href = 'maj2_membres.php?id=<?php echo($data['customer_id']) ?>&type=M'"><input type="button" value="Visite" class="bouton1" onclick="self.location.href = 'maj4_membres.php?id=<?php echo($data['customer_id']) ?>&type=P'"></td></tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
        }
        ?>
        <table class="listing">
            <caption style="background-color:#FFFFAA">Dernière mise à jour</caption>
            <tr><th class="TD0">Nom</th><th class="TD0">Prénom</th><th class="TD0">E-mail</th><th class="TD1">SMS</th><th class="TD1">Maj</th><th class="TD1"></tr>
            <?php
            while ($data = $result3->fetch()) {
                ?>
                <tr><td class="TD0" <?php if ($data['customer_suppression_flag'] <> 0) echo ('style="color:red"') ?>><?php echo nl2br(htmlspecialchars(strtoupper($data['customer_lastname']))) ?><div class="bulle"><?php echo nl2br(htmlspecialchars(strtoupper($data['customer_address1']))); ?> &nbsp; <?php echo nl2br(htmlspecialchars(strtoupper($data['customer_zipcode']))); ?> &nbsp; <?php echo nl2br(htmlspecialchars(strtoupper($data['customer_city']))) ?></div></td>
                    <td class="TD0"><?php echo nl2br(htmlspecialchars(strtoupper($data['customer_firstname']))) ?></td>
                    <td class="TD0"><?php echo nl2br(htmlspecialchars($data['customer_email'])) ?></td>
                    <td class="TD0"><?php echo nl2br(htmlspecialchars($data['customer_sms'])) ?></td>
                    <td class="TD1"><?php echo $data['customer_lastupdate'] ?></td>
                    <td class="TD1"><input type="button" value="Maj" class="bouton1" onclick="self.location.href = 'maj2_membres.php?id=<?php echo($data['customer_id']) ?>&type=M'"><input type="button" value="Visite" class="bouton1" onclick="self.location.href = 'maj4_membres.php?id=<?php echo($data['customer_id']) ?>&type=P'"></td></tr>
                <?php
            }
            ?>
            <?php
            if ($choix <> 0) {
                ?>
            </table>
            <table class="listing">
                <caption style="background-color:#FFFFAA">Recherche étendue</caption>
                <tr><th class="TD0">Nom</th><th class="TD0">Prénom</th><th class="TD0">E-mail</th><th class="TD1">SMS</th><th class="TD1">Visite</th><th class="TD1"></tr>
                <?php
                while ($data = $result->fetch()) {
                    ?>
                    <tr><td class="TD0" <?php if ($data['customer_suppression_flag'] <> 0) echo ('style="color:red"') ?>><?php echo nl2br(htmlspecialchars(strtoupper($data['customer_lastname']))) ?><div class="bulle"><?php echo nl2br(htmlspecialchars(strtoupper($data['customer_address1']))); ?> &nbsp; <?php echo nl2br(htmlspecialchars(strtoupper($data['customer_zipcode']))); ?> &nbsp; <?php echo nl2br(htmlspecialchars(strtoupper($data['customer_country']))) ?></div></td>
                        <td class="TD0"><?php echo nl2br(htmlspecialchars(strtoupper($data['customer_firstname']))) ?></td>
                        <td class="TD0"><?php echo nl2br(htmlspecialchars($data['customer_email'])) ?></td>
                        <td class="TD0"><?php echo nl2br(htmlspecialchars($data['customer_sms'])) ?></td>
                        <td class="TD1"><?php echo $data['customer_last_visit'] ?></td>
                        <td class="TD1"><input type="button" value="Maj" class="bouton1" onclick="self.location.href = 'maj2_membres.php?id=<?php echo($data['customer_id']) ?>&type=M'"><input type="button" value="Visite" class="bouton1" onclick="self.location.href = 'maj4_membres.php?id=<?php echo($data['customer_id']) ?>&type=P'"></td></tr>
                            <?php
                        }
                        ?>
            </table>
            <?php
        }
        ?>
    </body>
</html>