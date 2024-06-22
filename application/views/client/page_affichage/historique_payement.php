<h1 class="titre_vehicule"> Historique des factures  <img src="<?php echo base_url("assets/img/calendrier.png"); ?>" alt="" class="logo_facture" > </h1> 
    <div style="display:flex;justify-content:center;">
        <a data-bs-toggle="collapse" href="#multi_critere">  <img src="<?php echo base_url("assets/img/search.png"); ?>" alt="" style="width:95px;" > </a>

    </div>
    <form class="recherche_vehicule row collapse" id="multi_critere" action="<?php echo site_url('vehicule_controller/search_facture'); ?>" mathod="GET" >
        <div class="bloc_search_facture col-md-8 row"  >
            <div class="col-md-4 col-sm-12 ">
                Voiture:
            </div>
            <div class="col-md-4 col-sm-6 ">
                <input type="text" class="form-control"  placeholder="Immatriculation" name="immatriculation">
            </div>
            <div class="col-md-4  col-sm-6">
                <select class="form-select" name="assurance" >
                    <option selected value="">Assurance</option>
                    <option value="1">ARO</option>
                    <option value="2">MAMA</option>
                    <option value="3">HAVANA</option>
                </select>
            </div>

            <div class="col-md-4 col-sm-12">
                Date payement:
            </div>
            <div class="col-md-4 col-sm-6">
                <input type="date" class="form-control"  name="date_paye_min">
            </div>
            <div class="col-md-4 col-sm-6">
                <input type="date" class="form-control"  name="date_paye_max">
            </div>

            <div class="col-md-4 col-sm-12">
                Date expiration:
            </div>
            <div class="col-md-4 col-sm-6">
                <input type="date" class="form-control"   name="date_exp_min">
            </div>
            <div class="col-md-4 col-sm-6">
                <input type="date" class="form-control"  name="date_exp_max">
            </div>


        </div>
        <div class="col-md-4 div_submit">
            <button type="submit" class="btn btn-primary btn_search" >
                <img src="<?php echo base_url("assets/img/search.png"); ?>" alt=""> RECHERCHER 
            </button>

        </div>
    </form>

    <div class="panel_vehicule">
    <div class="image">
        <img src="<?php echo base_url("assets/img/ARO.png"); ?>" alt="" style="width:102px;" >
    </div>
    <div class="information">
        <table>
            <tr>
                <td>Immatriculation</td>
                <td>: 2380TBG  </td>
            </tr>
            <tr>
                <td>Assurance  </td>
                <td>: ARO </td>
            </tr>
            <tr>
                <td>Date payement</td>
                <td>: 16/06/2024 </td>
            </tr>
            <tr>
                <td>Date expiration</td>
                <td>: 17/07/2025 </td>
            </tr>
            <tr>
                <td>Police d'assurance</td>
                <td>: 01840/PSP/24 </td>
            </tr>
        </table>
    </div>
    
    <div class="bouton_redirection" >
        <a href="<?php echo base_url("vehicule_controller/detail/1"); ?>"><button class="btn btn-primary" > Voir facture </button></a> 
    </div>

    </div><!-- Fait div panel_vehicule1-->

    <div class="panel_vehicule">
    <div class="image">
        <img src="<?php echo base_url("assets/img/MAMA.png"); ?>" alt="" style="width:102px;" >
    </div>
    <div class="information">
        <table>
            <tr>
                <td>Immatriculation</td>
                <td>: 2380TBG  </td>
            </tr>
            <tr>
                <td>Assurance  </td>
                <td>: ARO </td>
            </tr>
            <tr>
                <td>Date payement</td>
                <td>: 16/06/2024 </td>
            </tr>
            <tr>
                <td>Date expiration</td>
                <td>: 17/07/2025 </td>
            </tr>
            <tr>
                <td>Police d'assurance</td>
                <td>: 01840/PSP/24 </td>
            </tr>
        </table>
    </div>
    
    <div class="bouton_redirection" >
        <a href="<?php echo base_url("vehicule_controller/detail/1"); ?>"><button class="btn btn-primary" > Voir facture </button></a> 
    </div>

    </div><!-- Fait div panel_vehicule2-->
    
    <div class="panel_vehicule">
    <div class="image">
        <img src="<?php echo base_url("assets/img/HAVANA.png"); ?>" alt="" style="width:102px;" >
    </div>
    <div class="information">
        <table>
            <tr>
                <td>Immatriculation</td>
                <td>: 2380TBG  </td>
            </tr>
            <tr>
                <td>Assurance  </td>
                <td>: ARO </td>
            </tr>
            <tr>
                <td>Date payement</td>
                <td>: 16/06/2024 </td>
            </tr>
            <tr>
                <td>Date expiration</td>
                <td>: 17/07/2025 </td>
            </tr>
            <tr>
                <td>Police d'assurance</td>
                <td>: 01840/PSP/24 </td>
            </tr>
        </table>
    </div>
    
    <div class="bouton_redirection" >
        <a href="<?php echo base_url("vehicule_controller/detail/1"); ?>"><button class="btn btn-primary" > Voir facture </button></a> 
    </div>

    </div><!-- Fait div panel_vehicule3-->

<nav aria-label="Page navigation example" style="display:flex;justify-content:center">
    <ul class="pagination">
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
        </li>
        <li class="page-item active"><a class="page-link" href="<?php echo base_url("pagination_controller/display_page_facture/1"); ?>">1</a></li>
        <li class="page-item"><a class="page-link" href="<?php echo base_url("pagination_controller/display_page_facture/2"); ?>">2</a></li>
        <li class="page-item"><a class="page-link" href="<?php echo base_url("pagination_controller/display_page_facture/3"); ?>">3</a></li>
        <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
    </ul>
</nav>