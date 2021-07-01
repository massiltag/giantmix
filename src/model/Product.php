<?php


class Product {

    private string $id;

    private string $nom;

    private string $fabricant;

    private float $prix;

    private string $categorie;

    private string $etat;

    /**
     * Product constructor.
     * @param string $nom
     * @param string $fabricant
     * @param float $prix
     * @param string $categorie
     * @param string $etat
     */
    public function __construct(string $id, string $nom, string $fabricant, float $prix, string $categorie, string $etat) {
        $this->id = $id;
        $this->nom = $nom;
        $this->fabricant = $fabricant;
        $this->prix = $prix;
        $this->categorie = $categorie;
        $this->etat = $etat;
    }

    /**
     * @return string
     */
    public function getNom(): string {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getFabricant(): string {
        return $this->fabricant;
    }

    /**
     * @param string $fabricant
     */
    public function setFabricant(string $fabricant): void {
        $this->fabricant = $fabricant;
    }

    /**
     * @return float
     */
    public function getPrix(): float {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix(float $prix): void {
        $this->prix = $prix;
    }

    /**
     * @return string
     */
    public function getCategorie(): string {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie(string $categorie): void {
        $this->categorie = $categorie;
    }

    /**
     * @return string
     */
    public function getEtat(): string {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat(string $etat): void {
        $this->etat = $etat;
    }

}