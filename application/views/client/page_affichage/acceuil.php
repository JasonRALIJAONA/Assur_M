<h1 class="titre_vehicule"> Liste des vehicules  </h1> 
    <form class="recherche_vehicule" action="<?php echo site_url('form_controller/search_vehicule'); ?>" mathod="GET" >
        <input type="text" class="form-control"  placeholder="Immatriculation" name="immatriculation">
        <button type="submit" class="btn btn-primary btn_search" >
            <img src="<?php echo base_url("assets/img/search.png"); ?>" alt="" width: > RECHERCHER 
        </button>
    </form>

    <div class="panel_vehicule">
    
    <div class="image" id="expirer" >
        <img src="<?php echo base_url("assets/img/icon_voiture.png"); ?>" alt="">
    </div>
    
    <div class="information">
        <table>
            <tr>
                <td>Assurance  </td>
                <td>: ARO </td>
            </tr>
            <tr>
                <td>Date expiration</td>
                <td>: 16/06/2024 </td>
            </tr>
            <tr>
                <td>Type</td>
                <td>: Voiture  </td>
            </tr>
            <tr>
                <td>Marque</td>
                <td>: Crafter </td>
            </tr>
        </table>
    </div>
    
    <div class="bouton_redirection" >
    <a href="<?php echo base_url("vehicule_controller/detail/1"); ?>"><button class="btn btn-primary" > Detail </button></a> 
    <a href="<?php echo base_url("vehicule_controller/payement/1"); ?>"><button class="btn btn-primary" > Payer </button> </a> 
    </div>

    </div><!-- Fait div panel_vehicule1-->

    <div class="panel_vehicule">
    <div class="image">
        <img src="<?php echo base_url("assets/img/icon_camion.png"); ?>" alt="">
    </div>
    <div class="information">
        <table>
            <tr>
                <td>Assurance</td>
                <td>: ARO </td>
            </tr>
            <tr>
                <td>Date expiration</td>
                <td>: 16/06/2024 </td>
            </tr>
            <tr>
                <td>Type</td>
                <td>: Camion  </td>
            </tr>
            <tr>
                <td>Marque</td>
                <td>: Toyota </td>
            </tr>
        </table>
    </div>
    
    <div class="bouton_redirection" >
        <a href="<?php echo base_url("vehicule_controller/detail/2"); ?>"><button class="btn btn-primary" > Detail </button></a> 
        <a href="<?php echo base_url("vehicule_controller/payement/2"); ?>"><button class="btn btn-primary" > Payer </button> </a> 
    </div>

    </div><!-- Fait div panel_vehicule2-->
    
    <div class="panel_vehicule">
    <div class="image" id="presque_expirer" >
        <img src="<?php echo base_url("assets/img/icon_moto.png"); ?>" alt="">
    </div>
    <div class="information">
        <table>
            <tr>
                <td>Assurance</td>
                <td>: HAVANA </td>
            </tr>
            <tr>
                <td>Date expiration</td>
                <td>: 16/06/2024 </td>
            </tr>
            <tr>
                <td>Type</td>
                <td>: Moto </td>
            </tr>
            <tr>
                <td>Marque</td>
                <td>: BMW </td>
            </tr>
        </table>
    </div>
    
    <div class="bouton_redirection" >
    <a href="<?php echo base_url("vehicule_controller/detail/3"); ?>"><button class="btn btn-primary" > Detail </button></a> 
    <a href="<?php echo base_url("vehicule_controller/payement/3"); ?>"><button class="btn btn-primary" > Payer </button> </a> 
    </div>

    </div><!-- Fait div panel_vehicule3-->
    
    <div class="panel_vehicule">
    <div class="image" id="expirer">
        <img src="<?php echo base_url("assets/img/icon_moto.png"); ?>" alt="">
    </div>
    <div class="information">
        <table>
            <tr>
                <td>Assurance</td>
                <td>: MAMA </td>
            </tr>
            <tr>
                <td>Date expiration</td>
                <td>: 16/06/2024 </td>
            </tr>
            <tr>
                <td>Type</td>
                <td>: Moto </td>
            </tr>
            <tr>
                <td>Marque</td>
                <td>: Mazda </td>
            </tr>
        </table>
    </div>
    
    <div class="bouton_redirection" >
        <a href="<?php echo base_url("vehicule_controller/detail/4"); ?>"><button class="btn btn-primary" > Detail </button></a> 
        <a href="<?php echo base_url("vehicule_controller/payement/4"); ?>"><button class="btn btn-primary" > Payer </button> </a> 
    </div>

    </div><!-- Fait div panel_vehicule4-->

    <div class="panel_vehicule">
    <div class="image">
        <img src="<?php echo base_url("assets/img/icon_autre.png"); ?>" alt="">
    </div>
    <div class="information">
        <table>
            <tr>
                <td>Assurance</td>
                <td>: MAMA </td>
            </tr>
            <tr>
                <td>Date expiration</td>
                <td>: 16/06/2024 </td>
            </tr>
            <tr>
                <td>Type</td>
                <td>: Non connu </td>
            </tr>
            <tr>
                <td>Marque</td>
                <td>: Mazda </td>
            </tr>
        </table>
    </div>
    
    <div class="bouton_redirection" >
        <a href="<?php echo base_url("vehicule_controller/detail/4"); ?>"><button class="btn btn-primary" > Detail </button></a> 
        <a href="<?php echo base_url("vehicule_controller/payement/4"); ?>"><button class="btn btn-primary" > Payer </button> </a> 
    </div>

    </div><!-- Fait div panel_vehicule5-->
<nav aria-label="Page navigation example" style="display:flex;justify-content:center">
    <ul class="pagination">
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <li class="page-item active"><a class="page-link" href="<?php echo base_url("pagination_controller/display_page_vehicule/1"); ?>">1</a></li>
        <li class="page-item"><a class="page-link" href="<?php echo base_url("pagination_controller/display_page_vehicule/2"); ?>">2</a></li>
        <li class="page-item"><a class="page-link" href="<?php echo base_url("pagination_controller/display_page_vehicule/3"); ?>">3</a></li>
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
    </ul>
</nav>