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

    return $film;
}

function insertFilm(Film $film): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Film (Titolo, Trama, Copertina)
    VALUES ('" . $film->getTitolo() . "', '" . $film->getTrama() . "', '" . $film->getCopertina() . "');";

    return $connection->query($query);
}

function editFilm($IDFilm, $newFilm): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Film 
    SET Titolo='" . $newFilm->getTitolo() . "', Trama='" . $newFilm->getTrama() . "', Copertina='" . $newFilm->getCopertina() . "'
    WHERE IDFilm=$IDFilm;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI FILM_ATTORE
function getFilmAttoreByFilm($IDFilm): FilmAttore
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM FilmAttore WHERE IDFFilm=" . $IDFilm;
    $data = $connection->query($query);

    $resultArray = new FilmAttore;

    while ($riga = $data->fetch_assoc()) {
        $filmAttore = new FilmAttore();
        $filmAttore->setIdfFilm($IDFilm);
        $filmAttore->setIdfAttore($riga['IDFAttore']);

        $resultArray[] = $filmAttore;
    }

    return $resultArray;
}

function getFilmAttoreByAttore($IDFAttore): FilmAttore
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM FilmAttore WHERE IDFAttore=" . $IDFAttore;
    $data = $connection->query($query);

    $resultArray = new FilmAttore;

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
    VALUES (" . $filmAttore->getIdfAttore() . ", " . $filmAttore->getIdfFilm() . ");";

    return $connection->query($query);
}

function editFilmAttore($idFilm, $idfAttore, $newFilmAttore): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE FilmAttore 
    SET IDFFilm=" . $newFilmAttore->getIdfAttore() . ", IDFAttore=" . $newFilmAttore->getIdfFilm() . "
    WHERE IDFFilm=$idFilm AND IDFAttore=$idfAttore;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI FILM_GENERE
function getFilmGenereByFilm($IDFilm): FilmGenere
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM FilmGenere WHERE IDFFilm=" . $IDFilm;
    $data = $connection->query($query);

    $resultArray = new FilmGenere;

    while ($riga = $data->fetch_assoc()) {
        $film = new FilmGenere();
        $film->setIdfFilm($IDFilm);
        $film->setIdfGenere($riga['IDFGenere']);

        $resultArray[] = $film;
    }

    return $resultArray;
}

function getFilmGenereByGenere($IDFGenere): FilmGenere
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM FilmGenere WHERE IDFGenere=" . $IDFGenere;
    $data = $connection->query($query);

    $resultArray = new FilmGenere;

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
    VALUES (" . $filmGenere->getIdfGenere() . ", " . $filmGenere->getIdfFilm() . ");";

    return $connection->query($query);
}

function editFilmGenere($idFilm, $idfGenere, $newFilmGenere): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE FilmGenere 
    SET IDFFilm=" . $newFilmGenere->getIdfGenere() . ", IDFGenere=" . $newFilmGenere->getIdfFilm() . "
    WHERE IDFFilm=$idFilm AND IDFGenere=$idfGenere;";

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

    $genere->setIdFilmGenere($data['IDGenere']);
    $genere->setNome($data['Nome']);
    $genere->setDescrizione($data['Descrizione']);
    $genere->setLimitazioni($data['Limitazioni']);

    return $genere;
}

function insertGenere(Genere $genere): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Genere (Nome, Descrizione, Limitazioni)
    VALUES ('" . $genere->getNome() . "', '" . $genere->getDescrizione() . "', " . $genere->getLimitazioni() . ");";

    return $connection->query($query);
}

function editGenere($idGenere, $newGenere): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Genere 
    SET Nome='" . $newGenere->getNome() . "', Descrizione='" . $newGenere->getDescrizione() . "', Limitazioni=" . $newGenere->getLimitazioni() . "
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
    $prenotazione->setIdfPosto($data['IDFPosto']);

    return $prenotazione;
}

function insertPrenotazione(Prenotazione $prenotazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Prenotazione (IDFUtente, IDFPosto)
    VALUES (" . $prenotazione->getIdfUtente() . ", " . $prenotazione->getIdfPosto() . ");";

    return $connection->query($query);
}

function editPrenotazione($IDPrenotazione, $newPrenotazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Prenotazione 
    SET IDFUtente=" . $newPrenotazione->getIdfUtente() . ", IDFPosto=" . $newPrenotazione->getIdfPosto() . "
    WHERE IDPrenotazione=$IDPrenotazione;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI PROGRAMMAZIONE
function getProgrammazioneById($IDProgrammazione): Programmazione
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Programmazione WHERE IDProgrammazione=" . $IDProgrammazione;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $programmazione = new Programmazione();

    $programmazione->setIdProgrammazione($data['IDProgrammazione']);
    $programmazione->setIdfEventi($data['IDFEventi']);
    $programmazione->setIdfFilm($data['IDFFilm']);
    $programmazione->setData($data['Data']);

    return $programmazione;
}

function insertProgrammazione(Programmazione $programmazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Programmazione (IDFEventi, IDFFilm, Data)
    VALUES (" . $programmazione->getIdfEventi() . ", " . $programmazione->getIdfFilm() . ", '" . $programmazione->getData() . "');";

    return $connection->query($query);
}

function editProgrammazione($IDProgrammazione, $newProgrammazione): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Programmazione 
    SET IDFEventi=" . $newProgrammazione->getIdfEventi() . ", IDFFilm=" . $newProgrammazione->getIdfFilm() . ", Data='" . $newProgrammazione->getData() . "'
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

function insertRuolo(Ruolo $ruolo): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Ruolo (Nome, Descrizione)
    VALUES ('" . $ruolo->getNome() . "', '" . $ruolo->getDescrizione() . "');";

    return $connection->query($query);
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
    $utente->setNome($data['Nome']);
    $utente->setCognome($data['Cognome']);
    $utente->setUsername($data['Username']);
    $utente->setPassword($data['Password']);
    $utente->setEmail($data['Email']);
    $utente->setCellulare($data['Cellulare']);

    return $utente;
}

function insertUtente(Utente $utente): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Utente (IDFRuolo, Nome, Cognome, Username, Password, Email, Cellulare)
    VALUES (" . $utente->getIdfRuolo() . ", '" . $utente->getNome() . "', '" . $utente->getCognome() . "', '" . $utente->getUsername() . "', '" . $utente->getPassword() . "', '" . $utente->getEmail() . "', '" . $utente->getCellulare() . "');";

    return $connection->query($query);
}

function editUtente($IDUtente, $newUtente): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Utente 
    SET IDFRuolo=" . $newUtente->getIdfRuolo() . ", Nome='" . $newUtente->getNome() . "', Cognome='" . $newUtente->getCognome() . "', Username='" . $newUtente->getUsername() . "', Password='" . $newUtente->getPassword() . "', Email='" . $newUtente->getEmail() . "', Cellulare='" . $newUtente->getCellulare() . "'
    WHERE IDUtente=$IDUtente;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI UTENTE_CINEMA
function getUtenteCinemaByUtente($IDUtente): UtenteCinema
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM UtenteCinema WHERE IDFUtente=" . $IDUtente;
    $data = $connection->query($query);

    $resultArray = new UtenteCinema;

    while ($riga = $data->fetch_assoc()) {
        $utenteCinema = new UtenteCinema();
        $utenteCinema->setIdfUtente($IDUtente);
        $utenteCinema->setIdfCinema($riga['IDFCinema']);

        $resultArray[] = $utenteCinema;
    }

    return $resultArray;
}

function getUtenteCinemaByCinema($IDFCinema): UtenteCinema
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM UtenteCinema WHERE IDFCinema=" . $IDFCinema;
    $data = $connection->query($query);

    $resultArray = new UtenteCinema;

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