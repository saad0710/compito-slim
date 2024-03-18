<?php
class Ordine implements JsonSerializable{
    protected $numero_ordine;
    protected $data;
    protected $importo_totale;
    protected $articoli_venduti[];

    public function __construct($numero_ordine, $data, $importo_totale) {
        $this->numero_ordine = $numero_ordine;
        $this->data = $data;
        $this->importo_totale = $importo_totale;
    }

    public function getNumero_ordine() {
        return $this->numero_ordine;
    }

    public function setNumero_ordine($numero_ordine) {
        $this->numero_ordine = $numero_ordine;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getImporto_totale() {
        return $this->importo_totale;
    }

    public function setImporto_totale($importo_totale) {
        $this->importo_totale = $importo_totale;
    }
}
?>