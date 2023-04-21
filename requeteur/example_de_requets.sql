
"###########"
"###########""Quelques example de requetes SQL:"
"###########"

"Sélectionner tous les clients et leurs informations de la table 'clients' :"
SELECT * FROM clients;

"Insérer un nouveau client :"
INSERT INTO clients (client_email, client_firstname, client_lastname, client_address, client_phone, client_password, subscription_id, date_registered, date_of_birth)
VALUES ('john.doe@example.com', 'John', 'Doe', '123 Main St', '+1-555-555-1212', 'mypassword', 1, '2023-04-15', '1980-01-01');

"Sélectionner tous les clients avec leur abonnement :"
SELECT c.*, s.subscription_name
FROM clients c
JOIN subscriptions s ON c.subscription_id = s.subscription_id;

"Mettre à jour l'adresse d'un client :"
UPDATE clients
SET client_address = '456 Main St'
WHERE client_id = 1;

"Supprimer un client :"
DELETE FROM clients
WHERE client_id = 1;

"Insérer une nouvelle réservation :"
INSERT INTO reservations (client_id, event_id, reservation_date, number_of_people, reservation_status)
VALUES (1, 1, '2023-05-01', 2, 'confirmed');

"Sélectionner toutes les réservations pour un client donné :"
SELECT r.*, e.event_name, e.event_date
FROM reservations r
JOIN events e ON r.event_id = e.event_id
WHERE r.client_id = 1;

"Mettre à jour le nombre de personnes pour une réservation donnée :"
UPDATE reservations
SET number_of_people = 4
WHERE reservation_id = 1;

"Sélectionner le nombre de chambres disponibles pour un événement spécifique :"
SELECT COUNT(*) FROM rooms WHERE room_capacity >= (SELECT SUM(number_of_people) FROM reservations WHERE event_id = [id de l'événement spécifique]);

"Mettre à jour l'état d'une facture de devis :"
UPDATE quotes_invoices SET quote_invoice_status = 'paid' WHERE quote_invoice_id = [id de la facture de devis spécifique];

"Supprimer un équipement de la table 'equipment' :"
DELETE FROM equipment WHERE equipment_id = [id de l'équipement spécifique];
