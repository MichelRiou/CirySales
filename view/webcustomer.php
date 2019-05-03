<div class="container py-5 extra">
    <div class="row">
        <div class="col-md-12">
            <div class="row" >
                <div class="col-md-6 mx-auto">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">Inscription</h3>
                        </div>
                        <div class="card-body">
                            <form  method="POST" action="routes.php?" name="form2" onSubmit="return verif_form2()">
                                <div class="form-group row offset-sm-5">
                                    <span><input type="radio" aria-label="Radio button for following text input" name="civility" value="MME" checked="checked">Mme </span>
                                    <span><input type="radio" aria-label="Radio button for following text input" name="civility" value="MLLE" >Mle</span>
                                    <span><input type="radio" aria-label="Radio button for following text input" name="civility" value="MR" >Mr</span>       
                                </div>                              
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="lastname">Nom:</label>
                                    <div class="input-group col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm  rounded-0" 
                                               name="lastname" id="lastname" >                             
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="firstname">Prénom:</label>
                                    <div class="input-group col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="firstname" id="firstname" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="address1">Adresse:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="address1" id="address1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="address2">Adresse-suite:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="address2" id="address2" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="zipcode">Code postal:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="zipcode" id="zipcode" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="city">Ville:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="city" id="city">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="email">E-mail:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3" for="sms">SMS:</label>
                                    <div class="col-sm-9">
                                        <input type="text" 
                                               class="form-control form-control-sm rounded-0" 
                                               name="sms" id="sms">
                                    </div>
                                </div> 
                                <div id='message' ></div>
                                <div><?php
                                    if (isset($messageErreur))
                                        echo ('<h5 class="text-warning text-center">' . $messageErreur . '</h5>');
                                    ?><div>
                                        <button type="submit" class="btn btn-success btn-sm float-right" 
                                                id="btnLogin" name='toto' >Enregistrer</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
