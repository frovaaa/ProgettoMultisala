<?php
require_once "Models/modelAttore.php";
require_once "Models/modelCinema.php";
require_once "Models/modelEvento.php";
require_once "Models/modelFilm.php";
require_once "Models/modelFilmAttore.php";
require_once "Models/modelFilmGenere.php";
require_once "Models/modelGenere.php";
require_once "Models/modelPosto.php";
require_once "Models/modelPrenotazione.php";
require_once "Models/modelPrenotazionePosto.php";
require_once "Models/modelProgrammazione.php";
require_once "Models/modelRuolo.php";
require_once "Models/modelSala.php";
require_once "Models/modelTipoPosto.php";
require_once "Models/modelUtente.php";
require_once "Models/modelUtenteCinema.php";

#region FUNZIONI ATTORE
function getAttoreById($IDAttore): Attore
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Attore WHERE IDAttore=" . $IDAttore;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $attore = new Attore();

    $attore->setIdAttore($data['IDAttore']);
    $attore->setNome($data['Nome']);
    $attore->setCognome($data['Cognome']);
    $attore->setDataDiNascita($data['DataDiNascita']);

    return $attore;
}

//get attore string by filmID
function getStringAttoriOfFilmID($IDFilm): string
{
    $attoriFilm = getFilmAttoreByFilm($IDFilm);
    //Foreach loop echo attore of attoriFilm
    $stringaAttori = "";
    foreach ($attoriFilm as $attore) {
        $attore = getAttoreById($attore->getIdfAttore());
        $stringaAttori .= $attore->getNome() . ' ' . $attore->getCognome() . " / ";
    }
    return substr($stringaAttori, 0, -3);
}

//Get all attore
function getAllAttori(): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Attore";
    $data = $connection->query($query);

    $attori = [];
    while ($row = $data->fetch_assoc()) {
        $attore = new Attore();

        $attore->setIdAttore($row['IDAttore']);
        $attore->setNome($row['Nome']);
        $attore->setCognome($row['Cognome']);
        $attore->setDataDiNascita($row['DataDiNascita']);

        $attori[] = $attore;
    }

    return $attori;
}

function insertAttore(Attore $attore): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Attore (Nome, Cognome, DataDiNascita)
    VALUES ('" . $attore->getNome() . "', '" . $attore->getCognome() . "', '" . $attore->getDataDiNascita() . "');";

    return $connection->query($query);
}

function editAttore($IDAttore, $newAttore): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Attore 
    SET Nome='" . $newAttore->getNome() . "', Cognome='" . $newAttore->getCognome() . "', DataDiNascita='" . $newAttore->getDataDiNascita() . "'
    WHERE IDAttore=$IDAttore;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI CINEMA
function getCinemaById($IDCinema): Cinema
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Cinema WHERE IDCinema=" . $IDCinema;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $cinema = new Cinema();

    $cinema->setNome($data['Nome']);
    $cinema->setEmail($data['Email']);
    $cinema->setTelefono($data['Telefono']);
    $cinema->setCitta($data['Citta']);
    $cinema->setProvincia($data['Provincia']);
    $cinema->setVia($data['Via']);
    $cinema->setCap($data['CAP']);

    return $cinema;
}

function getNomeCinema(): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT IDCinema, Nome FROM Cinema";
    $data = $connection->query($query);

    $cinemas = [];

    while ($row = $data->fetch_assoc()) {
        $cinema = new Cinema();

        $cinema->setNome($row["Nome"]);
        $cinema->setIdCinema($row["IDCinema"]);

        $cinemas[] = $cinema;
    }

    return $cinemas;
}

function insertCinema(Cinema $cinema): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Cinema (Nome, Email, Telefono, Citta, Provincia, Via, CAP)
    VALUES ('" . $cinema->getNome() . "', '" . $cinema->getEmail() . "', '" . $cinema->getTelefono() . "', '" . $cinema->getCitta() . "', '" . $cinema->getProvincia() . "', '" . $cinema->getVia() . "', ." . $cinema->getCap() . ");";

    return $connection->query($query);
}

function editCinema($IDCinema, $newCinema): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Cinema 
    SET Nome='" . $newCinema->getNome() . "', Email='" . $newCinema->getEmail() . "', Telefono='" . $newCinema->getTelefono() . "', Citta='" . $newCinema->getCitta() . "', Provincia='" . $newCinema->getProvincia() . "', Via='" . $newCinema->getVia() . "', CAP=" . $newCinema->getCap() . "
    WHERE IDCinema=$IDCinema;";

    return $connection->query($query);
}

//Get all cinemas
function getAllCinemas(): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Cinema";
    $data = $connection->query($query);

    $cinemas = [];

    while ($row = $data->fetch_assoc()) {
        $cinema = new Cinema();

        $cinema->setIdCinema($row['IDCinema']);
        $cinema->setNome($row['Nome']);
        $cinema->setEmail($row['Email']);
        $cinema->setTelefono($row['Telefono']);
        $cinema->setCitta($row['Citta']);
        $cinema->setProvincia($row['Provincia']);
        $cinema->setVia($row['Via']);
        $cinema->setCap($row['CAP']);

        $cinemas[] = $cinema;
    }

    return $cinemas;
}

//Delete cinema by id
function deleteCinema($IDCinema): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "DELETE FROM Cinema WHERE IDCinema=" . $IDCinema;

    return $connection->query($query);
}

#endregion

#region FUNZIONI EVENTO
function getEventoById($IDEvento): Evento
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Evento WHERE IDEvento=" . $IDEvento;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $evento = new Evento();

    $evento->setIdEvento($data['IDEvento']);
    $evento->setDescrizione($data['Descrizione']);

    return $evento;
}

function insertEvento(Evento $evento): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Evento (Descrizione)
    VALUES ('" . $evento->getDescrizione() . "');";

    return $connection->query($query);
}

function editEvento($IDEvento, $newEvento): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Evento 
    SET Descrizione='" . $newEvento->getDescrizione() . "'
    WHERE IDEvento=$IDEvento;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI FILM
function getFilmById($IDFilm): Film
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Film WHERE IDFilm=" . $IDFilm;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $film = new Film();

    $film->setIdFilm($data['IDFilm']);
    $film->setTitolo($data['Titolo']);
    $film->setTrama($data['Trama']);
    $film->setCopertina($data['Copertina']);
    $film->setRegista($data['Regista']);
    $film->setDurata($data['Durata']);
    $film->setTrailer($data['Trailer']);
    $film->setAnno($data['Anno']);

    return $film;
}

function getFilms(): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Film";
    $data = $connection->query($query);

    $filmArray = [];
    while ($riga = $data->fetch_assoc()) {
        $film = new Film();
        $film->setIdFilm($riga['IDFilm']);
        $film->setTitolo($riga['Titolo']);
        $film->setTrama($riga['Trama']);
        $film->setCopertina($riga['Copertina']);
        $film->setRegista($riga['Regista']);
        $film->setDurata($riga['Durata']);
        $film->setTrailer($riga['Trailer']);
        $film->setAnno($riga['Anno']);


        $filmArray[] = $film;
    }

    return $filmArray;
}

function getFilmsLimit($limit): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Film Limit " . $limit;
    $data = $connection->query($query);

    $filmArray = [];

    while ($riga = $data->fetch_assoc()) {
        $film = new Film();
        $film->setIdFilm($riga['IDFilm']);
        $film->setTitolo($riga['Titolo']);
        $film->setTrama($riga['Trama']);
        $film->setCopertina($riga['Copertina']);
        $film->setRegista($riga['Regista']);
        $film->setDurata($riga['Durata']);
        $film->setTrailer($riga['Trailer']);
        $film->setAnno($riga['Anno']);

        $filmArray[] = $film;
    }

    return $filmArray;
}

//Get film by film
function getFilmByFilm(Film $film): Film
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Film WHERE Titolo='" . $film->getTitolo() . "' AND Anno='" . $film->getAnno() . "' AND Regista='" . $film->getRegista() . "' AND Trama='" . $film->getTrama() . "' AND Copertina='" . $film->getCopertina() . "' AND Trailer='" . $film->getTrailer() . "' AND Durata='" . $film->getDurata() . "'";
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $film = new Film();

    $film->setIdFilm($data['IDFilm']);
    $film->setTitolo($data['Titolo']);
    $film->setTrama($data['Trama']);
    $film->setCopertina($data['Copertina']);
    $film->setRegista($data['Regista']);
    $film->setDurata($data['Durata']);
    $film->setTrailer($data['Trailer']);
    $film->setAnno($data['Anno']);

    return $film;
}

function insertFilm(Film $film): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Film (Titolo, Trama, Copertina, Regista, Durata, Trailer, Anno)
    VALUES ('" . $film->getTitolo() . "','" . $film->getTrama() . "','" . $film->getCopertina() . "','" . $film->getRegista() . "'," . $film->getDurata() . ",'" . $film->getTrailer() . "','" . $film->getAnno() . "');";

    return $connection->query($query);
}

function editFilm($IDFilm, $newFilm): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Film 
    SET Titolo='" . $newFilm->getTitolo() . "', Trama='" . $newFilm->getTrama() . "', Copertina='" . $newFilm->getCopertina() . "', Regista='" . $newFilm->getRegista() . "', Durata=" . $newFilm->getDurata() . ", Trailer='" . $newFilm->getTrailer() . "', Anno='" . $newFilm->getAnno() . "'
    WHERE IDFilm=$IDFilm;";

    return $connection->query($query);
}

//Delete film
function deleteFilm($IDFilm): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "DELETE FROM Film WHERE IDFilm=$IDFilm;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI FILM_ATTORE
function getFilmAttoreByFilm($IDFilm): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM FilmAttore WHERE IDFFilm=" . $IDFilm;
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $filmAttore = new FilmAttore();
        $filmAttore->setIdfFilm($IDFilm);
        $filmAttore->setIdfAttore($riga['IDFAttore']);

        $resultArray[] = $filmAttore;
    }

    return $resultArray;
}

function getFilmAttoreByAttore($IDFAttore): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM FilmAttore WHERE IDFAttore=" . $IDFAttore;
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $filmAttore = new FilmAttore();
        $filmAttore->setIdfFilm($riga['IDFFilm']);
        $filmAttore->setIdfAttore($IDFAttore);

        $resultArray[] = $filmAttore;
    }

    return $resultArray;
}

function insertFilmAttore(FilmAttore $filmAttore): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO FilmAttore (IDFFilm, IDFAttore)
    VALUES (" . $filmAttore->getIdfFilm() . ", " . $filmAttore->getIdfAttore() . ");";

    return $connection->query($query);
}

function editFilmAttore($idFilm, $idfAttore, $newFilmAttore): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE FilmAttore 
    SET IDFFilm=" . $newFilmAttore->getIdfFilm() . ", IDFAttore=" . $newFilmAttore->getIdfAttore() . "
    WHERE IDFFilm=$idFilm AND IDFAttore=$idfAttore;";

    return $connection->query($query);
}

//deleteFilmAttoreByFilm
function deleteFilmAttoreByFilm($IDFilm): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "DELETE FROM FilmAttore WHERE IDFFilm=$IDFilm;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI FILM_GENERE
function getFilmGenereByFilm($IDFilm): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM FilmGenere WHERE IDFFilm=" . $IDFilm;
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $film = new FilmGenere();
        $film->setIdfFilm($IDFilm);
        $film->setIdfGenere($riga['IDFGenere']);

        $resultArray[] = $film;
    }

    return $resultArray;
}

function getFilmGenereByGenere($IDFGenere): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM FilmGenere WHERE IDFGenere=" . $IDFGenere;
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $film = new FilmGenere();
        $film->setIdfFilm($riga['IDFFilm']);
        $film->setIdfGenere($IDFGenere);

        $resultArray[] = $film;
    }

    return $resultArray;
}

function insertFilmGenere(FilmGenere $filmGenere): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO FilmGenere (IDFFilm, IDFGenere)
    VALUES (" . $filmGenere->getIdfFilm() . ", " . $filmGenere->getIdfGenere() . ");";

    return $connection->query($query);
}

function editFilmGenere($idFilm, $idfGenere, $newFilmGenere): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE FilmGenere 
    SET IDFFilm=" . $newFilmGenere->getIdfFilm() . ", IDFGenere=" . $newFilmGenere->getIdfGenere() . "
    WHERE IDFFilm=$idFilm AND IDFGenere=$idfGenere;";

    return $connection->query($query);
}

//Delete all film_genere of a film
function deleteFilmGenereByFilm($IDFilm): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "DELETE FROM FilmGenere WHERE IDFFilm=" . $IDFilm;

    return $connection->query($query);
}

#endregion

#region FUNZIONI GENERE
function getGenereById($IDGenere): Genere
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Genere WHERE IDGenere=" . $IDGenere;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $genere = new Genere();

    $genere->setIdGenere($data['IDGenere']);
    $genere->setNome($data['Nome']);
    $genere->setLimitazioni($data['Limitazioni']);

    return $genere;
}

//Get all genere
function getAllGenere(): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Genere";
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $genere = new Genere();

        $genere->setIdGenere($riga['IDGenere']);
        $genere->setNome($riga['Nome']);
        $genere->setLimitazioni($riga['Limitazioni']);

        $resultArray[] = $genere;
    }

    return $resultArray;
}

function getStringGeneriOfFilm($IDFilm): string
{
    $generiFilm = getFilmGenereByFilm($IDFilm);
    //Foreach loop echo genere of generiFilm
    $stringaGeneri = "";
    foreach ($generiFilm as $genere) {
        $stringaGeneri .= getGenereById($genere->getIdfGenere())->getNome() . " / ";
    }
    return substr($stringaGeneri, 0, -3);
}

function insertGenere(Genere $genere): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Genere (Nome, Limitazioni)
    VALUES ('" . $genere->getNome() . "', " . $genere->getLimitazioni() . ");";

    return $connection->query($query);
}

function editGenere($idGenere, $newGenere): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Genere 
    SET Nome='" . $newGenere->getNome() . "', Limitazioni=" . $newGenere->getLimitazioni() . "
    WHERE IDGenere=$idGenere;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI POSTO
function getPostoById($IDPosto): Posto
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Posto WHERE IDPosto=" . $IDPosto;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $posto = new Posto();

    $posto->setIdPosto($data['IDPosto']);
    $posto->setIdfTipoPosto($data['IDFTipoPosto']);
    $posto->setIdfSala($data['IDFSala']);
    $posto->setRiga($data['Riga']);
    $posto->setColonna($data['Colonna']);

    return $posto;
}

//Add n posti up to Sala postimax
function insertPosti($idfSala, $nPosti, $nMaxColonna, $tipoPosto): bool
{
    //get last posto with idfSala
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "SELECT * FROM Posto WHERE IDFSala=$idfSala ORDER BY IDPosto DESC LIMIT 1";
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $riga = "A";
    $colonna = 1;
    if ($data != null) {
        $rigaOld = $data['Riga'];
        $colonnaOld = $data['Colonna'];
        if ($colonnaOld < $nMaxColonna) {
            $colonna = ++$colonnaOld;
            $riga = $rigaOld;
        } else {
            $riga = ++$rigaOld;
        }
    }

    if ($nPosti == 1) {
        $query = "INSERT INTO Posto (IDFTipoPosto, IDFSala, Riga, Colonna)
        VALUES ($tipoPosto, $idfSala, '$riga', '$colonna');";
    } else {
        $query = "INSERT INTO Posto (IDFTipoPosto, IDFSala, Riga, Colonna)
        VALUES ($tipoPosto, $idfSala, '$riga', '$colonna')";

        for ($i = 1; $i < $nPosti; $i++) {
            if ($colonna == $nMaxColonna) {
                $riga++;
                $colonna = 1;
            } else {
                $colonna++;
            }
            $query .= ", ($tipoPosto, $idfSala, '$riga', '$colonna')";
        }
        $query .= ";";

    }
    return $connection->query($query);
}

function getPostiBySala($IDFSala): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Posto WHERE IDFSala=" . $IDFSala;
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $posto = new Posto();

        $posto->setIdPosto($riga['IDPosto']);
        $posto->setIdfTipoPosto($riga['IDFTipoPosto']);
        $posto->setIdfSala($riga['IDFSala']);
        $posto->setRiga($riga['Riga']);
        $posto->setColonna($riga['Colonna']);

        $resultArray[] = $posto;
    }

    return $resultArray;
}

//get posto by prenotazionePosto
function getPostoByPrenotazionePosto($IDPrenotazionePosto): Posto
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Posto WHERE IDPosto=" . $IDPrenotazionePosto;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $posto = new Posto();

    $posto->setIdPosto($data['IDPosto']);
    $posto->setIdfTipoPosto($data['IDFTipoPosto']);
    $posto->setIdfSala($data['IDFSala']);
    $posto->setRiga($data['Riga']);
    $posto->setColonna($data['Colonna']);

    return $posto;
}

function insertPosto(Posto $posto): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Posto (IDFTipoPosto, IDFSala, Riga, Colonna)
    VALUES (" . $posto->getIdfTipoPosto() . ", " . $posto->getIdfSala() . ", '" . $posto->getRiga() . "', '" . $posto->getColonna() . "');";

    return $connection->query($query);
}

function editPosto($IDPosto, $newPosto): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Posto 
    SET IDFTipoPosto=" . $newPosto->getIdfTipoPosto() . ", IDFSala=" . $newPosto->getIdfSala() . ", Riga='" . $newPosto->getRiga() . "', Colonna='" . $newPosto->getColonna() . "'
    WHERE IDPosto=$IDPosto;";

    return $connection->query($query);
}

function isPostoOccupato($IDPosto, $IDProgrammazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM PrenotazionePosto INNER JOIN Prenotazione P on PrenotazionePosto.IDFPrenotazione = P.IDPrenotazione
         WHERE PrenotazionePosto.IDFPosto=$IDPosto AND P.IDFProgrammazione=$IDProgrammazione LIMIT 1;";

    $data = $connection->query($query);
    $data = $data->fetch_all();

    if (!$data) return false;
    else return true;
}

//From array of prenotazionePosto to string of posti
function getPostiFromPrenotazionePosto(array $prenotazionePosto): string
{
    $posti = "";
    foreach ($prenotazionePosto as $pp) {
        $posto = getPostoById($pp->getIdfPosto());
        $posti .= $posto->getColonna() . "-" . $posto->getRiga() . " | ";
    }
    $posti = substr($posti, 0, -1);
    return $posti;
}

#endregion

#region FUNZIONI PRENOTAZIONE
function getPrenotazioneById($IDPrenotazione): Prenotazione
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Prenotazione WHERE IDPrenotazione=" . $IDPrenotazione;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $prenotazione = new Prenotazione();

    $prenotazione->setIdPrenotazione($data['IDPrenotazione']);
    $prenotazione->setIdfUtente($data['IDFUtente']);
    $prenotazione->setIdfProgrammazione($data['IDFProgrammazione']);
    $prenotazione->setDataPrenotazione($data['DataPrenotazione']);
    $prenotazione->setCodice($data['Codice']);

    return $prenotazione;
}

//get prenotazioni by utente
function getPrenotazioniByUtente($IDFUtente): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Prenotazione WHERE IDFUtente=" . $IDFUtente;
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $prenotazione = new Prenotazione();

        $prenotazione->setIdPrenotazione($riga['IDPrenotazione']);
        $prenotazione->setIdfUtente($riga['IDFUtente']);
        $prenotazione->setIdfProgrammazione($riga['IDFProgrammazione']);
        $prenotazione->setDataPrenotazione($riga['DataPrenotazione']);
        $prenotazione->setCodice($riga['Codice']);

        $resultArray[] = $prenotazione;
    }

    return $resultArray;
}

//Get prenotazioni by programmazione
function getPrenotazioniByProgrammazione($IDFProgrammazione): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Prenotazione WHERE IDFProgrammazione=" . $IDFProgrammazione;
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $prenotazione = new Prenotazione();

        $prenotazione->setIdPrenotazione($riga['IDPrenotazione']);
        $prenotazione->setIdfUtente($riga['IDFUtente']);
        $prenotazione->setIdfProgrammazione($riga['IDFProgrammazione']);
        $prenotazione->setDataPrenotazione($riga['DataPrenotazione']);
        $prenotazione->setCodice($riga['Codice']);

        $resultArray[] = $prenotazione;
    }

    return $resultArray;
}

//Get prenotazione by codice and datetime
function getPrenotazioneByCodiceAndData($codice, $data): Prenotazione
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    //Datetime to string
    $data = $data->format('Y-m-d H:i:s');
    $query = "SELECT * FROM Prenotazione WHERE Codice='" . $codice . "' AND DataPrenotazione='" . $data . "';";
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $prenotazione = new Prenotazione();

    $prenotazione->setIdPrenotazione($data['IDPrenotazione']);
    $prenotazione->setIdfUtente($data['IDFUtente']);
    $prenotazione->setIdfProgrammazione($data['IDFProgrammazione']);
    $prenotazione->setDataPrenotazione($data['DataPrenotazione']);
    $prenotazione->setCodice($data['Codice']);

    return $prenotazione;
}

function insertPrenotazione(Prenotazione $prenotazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    //Datetime to string
    $data = $prenotazione->getDataPrenotazione()->format('Y-m-d H:i:s');

    $query = "INSERT INTO Prenotazione (IDFUtente, IDFProgrammazione, DataPrenotazione, Codice)
    VALUES (" . $prenotazione->getIdfUtente() . ", " . $prenotazione->getIdfProgrammazione() . ", '" . $data . "', '" . $prenotazione->getCodice() . "');";

    return $connection->query($query);
}

function editPrenotazione($IDPrenotazione, $newPrenotazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Prenotazione 
    SET IDFUtente=" . $newPrenotazione->getIdfUtente() . ", IDFProgrammazione=" . $newPrenotazione->getIdfProgrammazione() . ", DataPrenotazione='" . $newPrenotazione->getDataPrenotazione() . "', Codice='" . $newPrenotazione->getCodice() . "'
    WHERE IDPrenotazione=" . $IDPrenotazione;

    return $connection->query($query);
}

//Delete prenotazione by ID
function deletePrenotazione($IDPrenotazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "DELETE FROM Prenotazione WHERE IDPrenotazione=" . $IDPrenotazione;

    return $connection->query($query);
}

#endregion

#region FUNZIONI PROGRAMMAZIONE
function getProgrammazioniFilmByFilm($IDFFilm): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Programmazione WHERE IDFFilm=" . $IDFFilm;
    $data = $connection->query($query);

    $programmazioniArray = [];
    while ($riga = $data->fetch_assoc()) {
        $programmazione = new Programmazione();
        $programmazione->setIdProgrammazione($riga['IDProgrammazione']);
        $programmazione->setIdfFilm($IDFFilm);
        $programmazione->setIdfSala($riga['IDFSala']);
        $programmazione->setData($riga['Data']);

        $programmazioniArray[] = $programmazione;
    }

    return $programmazioniArray;
}

function getProgrammazioneById($IDProgrammazione): Programmazione
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Programmazione WHERE IDProgrammazione=" . $IDProgrammazione;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $programmazione = new Programmazione();

    $programmazione->setIdProgrammazione($data['IDProgrammazione']);
    $programmazione->setIdfEvento($data['IDFEvento']);
    $programmazione->setIdfFilm($data['IDFFilm']);
    $programmazione->setIdfSala($data['IDFSala']);
    $programmazione->setData($data['Data']);

    return $programmazione;
}

function getProgrammazioni(): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Programmazione";
    $data = $connection->query($query);

    $programmazioniArray = [];
    while ($riga = $data->fetch_assoc()) {
        $programmazione = new Programmazione();

        $programmazione->setIdProgrammazione($riga['IDProgrammazione']);
        $programmazione->setIdfEvento($riga['IDFEvento']);
        $programmazione->setIdfFilm($riga['IDFFilm']);
        $programmazione->setIdfSala($riga['IDFSala']);
        $programmazione->setData($riga['Data']);

        $programmazioniArray[] = $programmazione;
    }

    return $programmazioniArray;
}

function insertProgrammazione(Programmazione $programmazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Programmazione (IDFEvento, IDFFilm, IDFSala,Data)
    VALUES (" . $programmazione->getIdfEvento() . ", " . $programmazione->getIdfFilm() . ", " . $programmazione->getIdfSala() . ", '" . $programmazione->getData() . "');";

    return $connection->query($query);
}

function editProgrammazione($IDProgrammazione, $newProgrammazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Programmazione SET IDFEvento=" . $newProgrammazione->getIdfEvento() . ", IDFFilm=" . $newProgrammazione->getIdfFilm() . ", IDFSala=" . $newProgrammazione->getIdfSala() . ", Data='" . $newProgrammazione->getData() . "'
    WHERE IDProgrammazione=$IDProgrammazione;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI RUOLO
function getRuoloById($IDRuolo): Ruolo
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Ruolo WHERE IDRuolo=" . $IDRuolo;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $ruolo = new Ruolo();

    $ruolo->setIdRuolo($data['IDRuolo']);
    $ruolo->setNome($data['Nome']);
    $ruolo->setDescrizione($data['Descrizione']);

    return $ruolo;
}

//Get ruoli
function getRuoli(): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Ruolo";
    $data = $connection->query($query);

    $ruoliArray = [];
    while ($riga = $data->fetch_assoc()) {
        $ruolo = new Ruolo();

        $ruolo->setIdRuolo($riga['IDRuolo']);
        $ruolo->setNome($riga['Nome']);
        $ruolo->setDescrizione($riga['Descrizione']);

        $ruoliArray[] = $ruolo;
    }

    return $ruoliArray;
}

function getRuoloAsString($IDRuolo): string
{
    switch ($IDRuolo) {
        case 1:
            return "Cliente";
        case 2:
            return "Responsabile";
        case 3:
            return "Direttore";
        case 4:
            return "Amministratore";
        default:
            return $IDRuolo;
    }
}

function insertRuolo(Ruolo $ruolo): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Ruolo (Nome, Descrizione)
    VALUES ('" . $ruolo->getNome() . "', '" . $ruolo->getDescrizione() . "');";

    return $connection->query($query);
}

function imageUpdate(string $url): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE ";
    return true;
}

function editRuolo($IDRuolo, $newRuolo): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Ruolo 
    SET Nome='" . $newRuolo->getNome() . "', Descrizione='" . $newRuolo->getDescrizione() . "'
    WHERE IDRuolo=$IDRuolo;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI SALA
function getSalaById($IDSala): Sala
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Sala WHERE IDSala=" . $IDSala;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $sala = new Sala();

    $sala->setIdSala($data['IDSala']);
    $sala->setIdfCinema($data['IDFCinema']);
    $sala->setNumSala($data['NumSala']);
    $sala->setPostiMax($data['PostiMax']);
    return $sala;
}

function insertSala(Sala $sala): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Sala (IDFCinema, NumSala, PostiMax)
    VALUES (" . $sala->getIdfCinema() . ", '" . $sala->getNumSala() . "', " . $sala->getPostiMax() . ");";

    return $connection->query($query);
}

function editSala($IDSala, $newSala): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Sala 
    SET IDFCinema=" . $newSala->getIdfCinema() . ", NumSala='" . $newSala->getNumSala() . "', PostiMax=" . $newSala->getPostiMax() . "
    WHERE IDSala=$IDSala;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI TIPOPOSTO
function getTipoPostoById($IDTipoPosto): TipoPosto
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM TipoPosto WHERE IDTipoPosto=" . $IDTipoPosto;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $tipoPosto = new TipoPosto();

    $tipoPosto->setIdTipoPosto($data['IDTipoPosto']);
    $tipoPosto->setNome($data['Nome']);

    return $tipoPosto;
}

function insertTipoPosto(TipoPosto $tipoPosto): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO TipoPosto (Nome)
    VALUES ('" . $tipoPosto->getNome() . "');";

    return $connection->query($query);
}

function editTipoPosto($IDTipoPosto, $newTipoPosto): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE TipoPosto 
    SET Nome='" . $newTipoPosto->getNome() . "'
    WHERE IDTipoPosto=$IDTipoPosto;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI UTENTE
function getUtenteById($IDUtente): Utente
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Utente WHERE IDUtente=" . $IDUtente;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $utente = new Utente();

    $utente->setIdUtente($data['IDUtente']);
    $utente->setIdfRuolo($data['IDFRuolo']);
    $utente->setAttivo($data['Attivo']);
    $utente->setNome($data['Nome']);
    $utente->setCognome($data['Cognome']);
    $utente->setUsername($data['Username']);
    $utente->setPassword($data['Password']);
    $utente->setEmail($data['Email']);
    $utente->setCellulare($data['Cellulare']);
    $utente->setImmagineProfilo($data['ImmagineProfilo']);

    return $utente;
}

//Get utenti
function getUtenti(): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Utente";
    $data = $connection->query($query);

    $utenti = [];

    while ($row = $data->fetch_assoc()) {
        $utente = new Utente();

        $utente->setIdUtente($row['IDUtente']);
        $utente->setIdfRuolo($row['IDFRuolo']);
        $utente->setAttivo($row['Attivo']);
        $utente->setNome($row['Nome']);
        $utente->setCognome($row['Cognome']);
        $utente->setUsername($row['Username']);
        $utente->setPassword($row['Password']);
        $utente->setEmail($row['Email']);
        $utente->setCellulare($row['Cellulare']);
        $utente->setImmagineProfilo($row['ImmagineProfilo']);

        $utenti[] = $utente;
    }

    return $utenti;
}

function insertUtente(Utente $utente): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Utente (IDFRuolo, Nome, Cognome, Username, Password, Email, Cellulare, ImmagineProfilo)
    VALUES (" . $utente->getIdfRuolo() . ", '" . $utente->getNome() . "', '" . $utente->getCognome() . "', '" . $utente->getUsername() . "', '" . $utente->getPassword() . "', '" . $utente->getEmail() . "', '" . $utente->getCellulare() . "', '" . $utente->getImmagineProfilo() . "');";
    return $connection->query($query);
}

function editUtente($IDUtente, $newUtente): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Utente 
    SET IDFRuolo=" . $newUtente->getIdfRuolo() . ", Attivo=" . $newUtente->getAttivo() . ", Nome='" . $newUtente->getNome() . "', Cognome='" . $newUtente->getCognome() . "', Username='" . $newUtente->getUsername() . "', Password='" . $newUtente->getPassword() . "', Email='" . $newUtente->getEmail() . "', Cellulare='" . $newUtente->getCellulare() . "', ImmagineProfilo='" . $newUtente->getImmagineProfilo() . "'
    WHERE IDUtente=$IDUtente;";

    return $connection->query($query);
}

//Get Direttore of Cinema
function getUtenteOfCinemaByRole($IDCinema, $IDFRuolo): Utente
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM (Utente INNER JOIN UtenteCinema UC on Utente.IDUtente = UC.IDFUtente) WHERE IDFCinema=$IDCinema AND IDFRuolo=$IDFRuolo;";
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $utente = new Utente();

    $utente->setIdUtente($data['IDUtente']);
    $utente->setIdfRuolo($data['IDFRuolo']);
    $utente->setAttivo($data['Attivo']);
    $utente->setNome($data['Nome']);
    $utente->setCognome($data['Cognome']);
    $utente->setUsername($data['Username']);
    $utente->setPassword($data['Password']);
    $utente->setEmail($data['Email']);
    $utente->setCellulare($data['Cellulare']);

    return $utente;
}

//is utente attivo
function isAttivo($Utente): bool
{
    if ($Utente->getAttivo()) return true;
    else return false;
}

//Delete utente
function deleteUtente($IDUtente): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "DELETE FROM Utente WHERE IDUtente=$IDUtente;";
    return $connection->query($query);
}

#region ROLE_IDENTIFICATION
function isCliente($Utente): bool
{
    if ($Utente->getIdfRuolo() == 1) return true;
    else return false;
}

function isResponsabile($Utente): bool
{
    if ($Utente->getIdfRuolo() == 2) return true;
    else return false;
}

function isDirettore($Utente): bool
{
    if ($Utente->getIdfRuolo() == 3) return true;
    else return false;
}

function isAmministratore($Utente): bool
{
    if ($Utente->getIdfRuolo() == 4) return true;
    else return false;
}

#endregion

#endregion

#region FUNZIONI UTENTE_CINEMA
function getUtenteCinemaByUtente($IDUtente): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM UtenteCinema WHERE IDFUtente=" . $IDUtente;
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $utenteCinema = new UtenteCinema();
        $utenteCinema->setIdfUtente($IDUtente);
        $utenteCinema->setIdfCinema($riga['IDFCinema']);

        $resultArray[] = $utenteCinema;
    }

    return $resultArray;
}

function getUtenteCinemaByCinema($IDFCinema): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM UtenteCinema WHERE IDFCinema=" . $IDFCinema;
    $data = $connection->query($query);
    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $utenteCinema = new UtenteCinema();
        $utenteCinema->setIdfUtente($riga['IDFUtente']);
        $utenteCinema->setIdfCinema($IDFCinema);

        $resultArray[] = $utenteCinema;
    }

    return $resultArray;
}

function insertUtenteCinema(UtenteCinema $utenteCinema): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO UtenteCinema (IDFUtente, IDFCinema)
    VALUES (" . $utenteCinema->getIdfCinema() . ", " . $utenteCinema->getIdfUtente() . ");";

    return $connection->query($query);
}

function editUtenteCinema($idUtente, $idfCinema, $newUtenteCinema): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE UtenteCinema 
    SET IDFUtente=" . $newUtenteCinema->getIdfCinema() . ", IDFCinema=" . $newUtenteCinema->getIdfUtente() . "
    WHERE IDFUtente=$idUtente AND IDFCinema=$idfCinema;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI PRENOTAZIONE_POSTO
function getPrenotazioniPostoByPrenotazione($IDPrenotazione): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM PrenotazionePosto WHERE IDFPrenotazione=" . $IDPrenotazione;
    $data = $connection->query($query);

    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $prenotazionePosto = new PrenotazionePosto();
        $prenotazionePosto->setIdfPrenotazione($IDPrenotazione);
        $prenotazionePosto->setIdfPosto($riga['IDFPosto']);

        $resultArray[] = $prenotazionePosto;
    }

    return $resultArray;
}

//Get prenotazioiPosto by programmazione
function getPrenotazioniPostoByProgrammazione($IDFProgrammazione): array
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM PrenotazionePosto INNER JOIN Prenotazione P on PrenotazionePosto.IDFPrenotazione = P.IDPrenotazione
    WHERE IDFProgrammazione=" . $IDFProgrammazione;
    $data = $connection->query($query);

    if (!$data) return [];

    $resultArray = [];

    while ($riga = $data->fetch_assoc()) {
        $prenotazionePosto = new PrenotazionePosto();
        $prenotazionePosto->setIdfPrenotazione($riga['IDFPrenotazione']);
        $prenotazionePosto->setIdfPosto($riga['IDFPosto']);

        $resultArray[] = $prenotazionePosto;
    }

    return $resultArray;
}

function getPrenotazionePostoByPosto($IDFPosto): PrenotazionePosto
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM PrenotazionePosto WHERE IDFPosto=" . $IDFPosto;
    $data = $connection->query($query);

    $riga = $data->fetch_assoc();

    $prenotazionePosto = new PrenotazionePosto();
    $prenotazionePosto->setIdfPrenotazione($riga['IDFPrenotazione']);
    $prenotazionePosto->setIdfPosto($IDFPosto);

    return $prenotazionePosto;
}

//Insert PrenotazionePosto
function insertPrenotazionePosto(PrenotazionePosto $prenotazionePosto): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO PrenotazionePosto (IDFPrenotazione, IDFPosto)
    VALUES (" . $prenotazionePosto->getIdfPrenotazione() . ", " . $prenotazionePosto->getIdfPosto() . ");";

    return $connection->query($query);
}

//Edit PrenotazionePosto
function editPrenotazionePosto($idPrenotazione, $idfPosto, $newPrenotazionePosto): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE PrenotazionePosto 
    SET IDFPrenotazione = " . $newPrenotazionePosto->getIdfPrenotazione() . ", IDFPosto = " . $newPrenotazionePosto->getIdfPosto() . "
    WHERE IDFPrenotazione = $idPrenotazione AND IDFPosto = $idfPosto;";

    return $connection->query($query);
}
#endregion