# Introduzione
Dall’incontro con il signor. Bartolucci, il quale ci ha richiesto di realizzare un gestionale per la sua vasta catena di cinema multisala, sono state redatte le seguenti funzionalità. Il tempo stimato di realizzazione previsto è di 100 ore lavorative. 
# Elenco funzionalità degli utenti
###### Cliente
  - Registrazione con i propri dati personali
  - Prenotazione di un numero di posti per una determinata visione
  - Visione delle varie programmazioni di tutti i cinema presenti nella catena con annesso sistema di filtraggio della ricerca per titolo, genere, attore, ecc.
###### Responsabile di sala:
  - Convalida dei biglietti tramite QR code
  - Esecuzione delle prenotazioni in loco
  - Gestione dei posti non confermati
###### Direttore del cinema:
  - Gestione del personale
  - Visione report di prenotazioni e di entrate della sala da lui gestita in base a film, genere o attore
  - Gestione del palinsesto in base ai report di gradimento, selezionando i film e le fasce orarie nelle quali saranno disponibili per la visione
###### Amministratore della catena:
  - Gestione del personale di ogni cinema
  - Visione della reportistica generale o specifica per cinema o sala
  - Possibilità di aggiungere un eventuale nuovo cinema alla catena
###### Funzionalità generiche
  - Prenotazione da parte di aziende o altre istituzioni di sale per eventi e conferenze
  - Gestione delle prenotazioni non confermate in cassa (scadenza della prenotazione)
 
# Descrizione delle funzionalità degli utenti
## Cliente
Il cliente ha la possibilità, registrandosi prima al portale, di prenotare la visione di un film presente nel palinsesto. Esso deve semplicemente selezionare visivamente i posti da occupare per una determinata visione e al completamento della prenotazione gli verrà mostrato, e inviato via mail, il resoconto della prenotazione; il quale conterrà un QR code per il controllo in biglietteria. 
## Responsabile di sala
Il responsabile di sala gestirà la logistica della sala assegnatagli, esso dovrà convalidare le prenotazioni in biglietteria ed eventualmente eseguirne in loco; riscuotendo poi i soldi delle prenotazioni. Data la possibile presenza di film destinati a determinate fasce d’età esso dovrà anche controllare eventualmente la possibilità del cliente di assistere alla visione.
## Direttore del cinema
Il responsabile del cinema è colui che gestisce la programmazione del palinsesto. Esso in base a resoconti delle visioni precedenti gestisce quali film e in che fasce orarie verranno resi disponibili nelle settimane a venire. Il resoconto del piacimento da parte del pubblico è in base al numero di prenotazioni eseguite per un determinato film, genere o attore in base alle richieste del responsabile.
Esso ha la possibilità inoltre di visualizzare un resoconto delle entrate di ogni film, per verificarne così l’effettiva visualizzazione o meno da parte dei clienti.
Il direttore del cinema gestisce anche il personale e le sale assegnate ai responsabili di sala.
## Amministratore della catena
L’amministratore di catena è colui che ha la possibilità di controllare e gestire qualsiasi aspetto della sua catena di sale. Esso ha accesso a vari resoconti, per cinema, per sala o per film delle prenotazioni e entrate registrate. Nel caso di costruzione o acquisizione di un nuovo cinema esso potrà facilmente aggiungerlo alla catena ed assegnare eventuali dipendenti.
L’amministratore della catena è l’unico in grado di gestire chi ha il ruolo di Direttore del cinema.
