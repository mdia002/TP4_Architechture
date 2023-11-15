<?php

/*BanqueDO*/
class BanqueDO {
    public ?int $Banque_id;
    public ?string $Banque_nom;
  
    
    function getBanque_id(){
        return $this->Banque_id;;
    }

    function getBanque_nom(){
        return $this->Banque_nom;
    }

    function setBanque_id($Banque_id){
        $this->Banque_nom = $Banque_id;
    }


    function setBanque_nom($Banque_nom){
        $this->Banque_nom = $Banque_nom;
    }
}

/*AgenceDO*/
class AgenceDO {
    public ?int $Agence_id;
    public ?string $Agence_nom;
    public ?string $Agence_adresse;
   
    
    function getAgence_id(){
        return $this-> Agence_id;
    }

    function getAgence_nom(){
        return $this-> Agence_nom;
    }

    function getAgence_adresse(){
        return $this-> Agence_adresse;
    }

    function setAgence_id ($Agence_id){
        $this->Agence_id= $Agence_id;
    }

    function setAgence_nom($Agence_nom){
        $this->Agence_nom = $Agence_nom;
    }

    function setAgence_adresse($Agence_adresse){
        $this->Agence_adresse = $Agence_adresse;
    }
}

/*ConseillerDO*/
class ConseillerDO {
    public ?int $Conseiller_id;
    public ?string $Conseiller_nom;
  
    
    function getConseiller_id(){
        return $this->Conseiller_id;
    }

    function getConseiller_nom(){
        return $this->Conseiller_nom;
    }

    function setConseiller_id($Conseiller_id){
        $this->Conseiller_id= $Conseiller_id;
    }


    function setConseiller_nom($Conseiller_nom){
        $this->Conseiller_nom= $Conseiller_nom;
    }
}

/*CompteDO*/
class CompteDO {
    public ?int $Compte_id;
    public ?int $Client_id;
    public ?DateTime $date_ouvert;
    public ?string $Type_compte;

   
    
    function getCompte_id(){
        return $this->Compte_id;;
    }

    function getClient_id() {
        return $this->Client_id;
    }

    function getdate_ouvert(){
        return $this->date_ouvert;
    }


    function getType_compte(){
        return $this->Type_compte;
    }

    function setCompte_id($Compte_id){
        $this->Compte_id = $Compte_id;
    }

    function setClient_id($Client_id){
        $this->Client_id = $Client_id;
    }

    function setdate_ouvert($date_ouvert){
        $this->date_ouvert = $date_ouvert;
    }
    function setType_compte($Type_compte){
        $this->Type_compte = $Type_compte;
    }
}


/*ClientDO*/

class ClientDO {
    public ?int $Client_id;
    public ?string $Nom_client;
    public ?string $Type_client;
    public ?string $Situation_familiale;
    public ?string $Adresse_client;
    public ?int $Code_postal;
    public ?string $Ville;
    public ?string $Tel;

   
    function getClient_id(){ 
        return $this->Client_id; 
    }

    function getNom_client(){
        return $this->Nom_client;
    }

    function getType_client(){
        return $this->Type_client;
    }

    function getSituation_familiale(){
        return $this->Situation_familiale;
    }
    function getAdresse_client(){
        return $this->Adresse_client;
    }
  
  

    function getCode_postal(){
        return $this->Code_postal;
    }

    function getVille(){
        return $this->Ville;
    }

    function getTel(){
        return $this->Tel;
    }

    function setClient_id($Client_id){
        $this->Client_id = $Client_id;
    }

    function setNom_client($Nom_client){
        $this->Nom_client = $Nom_client;
    }

    function setType_client($Type_client){
        $this->Type_client = $Type_client;
    }

    function setSituation_familiale($Situation_familiale){
        $this->Situation_familiale = $Situation_familiale;
    }

    function setAdresse_client($Adresse_client){
        $this->Adresse_client = $Adresse_client;
    }

    function setCode_postal($Code_postal){
        $this->Code_postal = $Code_postal;
    }

    function setVille($Ville){
        $this->Ville = $Ville;
    }

    function setTel($Tel){
        $this->Tel = $Tel;
    }
    
}


/*OperationDO*/

class OperationDO {
    public ?int $Operation_id;
    public ?string $Operation_libelle;
    public ?DateTime $Operation_date;
    public ?float $montant_debit;
    public ?float $montant_credit;

   

    
    function getOperation_id(){
        return $this->Operation_id;
    }

    function getOperation_libelle(){
        return $this->Operation_libelle;
    }

    function getOperation_date(){
        return $this->Operation_date;
    }
    function getMontant_debit(){
        return $this->montant_debit;
    }

    function getMontant_credit(){
        return $this->montant_credit;
    }

    function setOperation_id($Operation_id){
        $this->Operation_id = $Operation_id;
    }

    function setOperation_libelle($Operation_libelle){
        $this->Operation_libelle = $Operation_libelle;
    }

    function setOperation_date($Operation_date){
        $this->Operation_date = $Operation_date;
    }

    function setmontant_debit($montant_debit){
        $this->montant_debit = $montant_debit;
    }

    function setmontant_credit($montant_credit){
        $this->montant_credit = $montant_credit;
    }
}









?>














/*DAO Agence*/ 







?>






