package fr.cookmasters.javaapp;

import com.itextpdf.text.*;
import com.itextpdf.text.pdf.*;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.chart.BarChart;
import javafx.scene.chart.PieChart;

import com.google.gson.*;

import javafx.scene.chart.XYChart;
import javafx.scene.control.Button;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;

import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.time.LocalDate;
import java.time.Period;
import java.io.IOException;
import java.util.HashMap;

public class ChartsController {
    @FXML
    private Button btnReload;

    @FXML
    private Button btnSavePdf;

    @FXML
    private BarChart<String, Number> graphAge;

    @FXML
    private BarChart<String, Number> graphInscriptionDate;

    @FXML
    private PieChart graphSubscriptionType;

    @FXML
    private PieChart graphUsers;

    @FXML
    private TableView<User> tableUsers;

    @FXML
    private TableColumn<User, String> email;

    @FXML
    private TableColumn<User, String> firstname;

    @FXML
    private TableColumn<User, Integer> id;

    @FXML
    private TableColumn<User, String> lastname;

    @FXML
    private TableColumn<User, String> role;

    @FXML
    private TableColumn<User, String> subscription;

    @FXML
    private TableColumn<User, String> username;


    private ApiConnection api = null;

    HashMap<Integer, Integer> tableauAge = new HashMap<>();
    Integer ageVariable;
    Integer nombreAge = 1;

    HashMap<String, Integer> tableauRole = new HashMap<>();
    String roleName;
    Integer nombreRole = 1;

    HashMap<String, Integer> tableauSubscription = new HashMap<>();
    String subscriptionPlanType;
    Integer nombreSubscription = 1;

    HashMap<LocalDate, Integer> tableauInscription = new HashMap<>();
    String inscriptionDate;
    Integer nombreInscription = 1;

    ObservableList<User> tableauUsers = FXCollections.observableArrayList();

    /**
     * Constructor
     * 
     * @param api
     */
    public ChartsController(ApiConnection api) {
        this.api = api;
    }


    /**
     * Generate charts
     * 
     * @param Event
     * @throws IOException
     * 
     * @return void
     */
    @FXML
    void generate(ActionEvent Event) throws IOException {
        //remettre les graph a 0:
        graphAge.getData().clear();
        graphInscriptionDate.getData().clear();
        graphSubscriptionType.getData().clear();
        graphUsers.getData().clear();

        tableauAge.clear();
        tableauRole.clear();
        tableauSubscription.clear();

        try {
            JsonObject users = api.getUsers();
            JsonElement dataElement = users.get("data");
            JsonArray dataArray = JsonParser.parseString(String.valueOf(dataElement)).getAsJsonArray();
            for (JsonElement element:dataArray) {
                JsonObject dataList = element.getAsJsonObject();

                /////////////////////////////////////////////
                //recup le prenom de l'user :
                String spFirstname = dataList.get("firstname").getAsString();
                System.out.print("\n" + spFirstname + " ");

                /////////////////////////////////////////////
                //recup le nom de l'user :
                String spLastname = dataList.get("lastname").getAsString();
                System.out.println(spLastname);

                /////////////////////////////////////////////
                //recup l'email de l'user :
                String spEmail = dataList.get("email").getAsString();
                System.out.println("email : " + spEmail);

                /////////////////////////////////////////////
                //recup l'username de l'user :
                String spUsername = dataList.get("username").getAsString();
                System.out.println("username : " + spUsername);

                /////////////////////////////////////////////
                //recup le pays de l'user :
                String spPays = null;
                JsonElement countryElement = dataList.get("country");
                if (countryElement != null  && !(countryElement instanceof JsonNull)) {
                    spPays = dataList.get("country").getAsString();
                    System.out.println("pays : " + spPays);
                } else {
                    // La valeur est nulle, faire quelque chose en conséquence
                    System.out.println("Pays inconnu.");
                }
                
                /////////////////////////////////////////////
                //recup l'age avec la birthday de l'user :
                JsonElement birthdayElement = dataList.get("birthday");
                Integer years = null;
                // Vérifier si la valeur n'est pas nulle
                if (birthdayElement != null && !(birthdayElement instanceof JsonNull)) {
                    String birthdayString = birthdayElement.getAsString();
                    LocalDate birthday = LocalDate.parse(birthdayString.substring(0, 10));
                    // Calculer l'âge
                    LocalDate currentDate = LocalDate.now();
                    Period age = Period.between(birthday, currentDate);
                    years = age.getYears();

                    // Utiliser l'âge
                    System.out.println("date de naissance : " + birthday);
                    System.out.println("age : " + years + " ans.");
                    ageVariable = years;
                    if (tableauAge.containsKey(ageVariable)) {
                        Integer nombreAge = tableauAge.get(ageVariable);
                        tableauAge.put(ageVariable, nombreAge + 1);
                    } else {
                        tableauAge.put(ageVariable, nombreAge);
                    }
                }

                /////////////////////////////////////////////
                //recup le type de subscription de l'user :
                String subscriptionPlanType = dataList.get("subscription_plan").getAsJsonObject().get("name").getAsString();
                if (tableauSubscription.containsKey(subscriptionPlanType)) {
                    Integer nombreSubscription = tableauSubscription.get(subscriptionPlanType);
                    tableauSubscription.put(subscriptionPlanType, nombreSubscription + 1);
                } else {
                    tableauSubscription.put(subscriptionPlanType, nombreSubscription);
                }

                /////////////////////////////////////////////
                //recup le role de l'user :
                String roleName = dataList.get("role").getAsJsonObject().get("name").getAsString();
                if (tableauRole.containsKey(roleName)) {
                    Integer nombreRole = tableauRole.get(roleName);
                    tableauRole.put(roleName, nombreRole + 1);
                } else {
                    tableauRole.put(roleName, nombreRole);
                }

                /////////////////////////////////////////////
                //recup la date d'inscription de l'user :
                JsonElement inscriptionDate = dataList.get("created_at");
                LocalDate inscriptionDateLocalDate = null;
                if (inscriptionDate != null && !(inscriptionDate instanceof JsonNull)) {
                    String inscriptionDateString = inscriptionDate.getAsString();
                    inscriptionDateLocalDate = LocalDate.parse(inscriptionDateString.substring(0, 10));
                    System.out.println("date d'inscription : " + inscriptionDateLocalDate);
                    if (tableauInscription.containsKey(inscriptionDateLocalDate)) {
                        Integer nombreInscription = tableauInscription.get(inscriptionDateLocalDate);
                        tableauInscription.put(inscriptionDateLocalDate, nombreInscription + 1);
                    } else {
                        tableauInscription.put(inscriptionDateLocalDate, nombreInscription);
                    }
                } else {
                    System.out.println("Date d'inscription inconnue.");
                }

                Integer userId = dataList.get("id").getAsInt();

                User user = new User(userId, spFirstname, spLastname, spEmail, spUsername, subscriptionPlanType, roleName);
                tableauUsers.add(user);
            }

            //////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////
            //print le type de role de l'user :
            System.out.println("\n");
            System.out.println("roleName :");

            tableauSubscription.keySet().stream().sorted().forEach(subscriptionPlanType -> {
                System.out.println(subscriptionPlanType + " : " + tableauSubscription.get(subscriptionPlanType));
                PieChart.Data data = new PieChart.Data(subscriptionPlanType, tableauSubscription.get(subscriptionPlanType));
                graphUsers.getData().add(data);
            });


            /////////////////////////////////////////////
            //print le type de subscription de l'user :
            System.out.println("\n");
            System.out.println("subscriptionPlanType :");

            tableauRole.keySet().stream().sorted().forEach(roleName -> {
                System.out.println(roleName + " : " + tableauRole.get(roleName));
                PieChart.Data data = new PieChart.Data(roleName, tableauRole.get(roleName));
                graphSubscriptionType.getData().add(data);
            });


            /////////////////////////////////////////////
            //print l'age de l'user :
            System.out.println("\n");
            System.out.println("ageVariable :");

            tableauAge.keySet().stream().sorted().forEach(ageVariable -> {
                System.out.println(ageVariable + " : " + tableauAge.get(ageVariable));
                XYChart.Series<String, Number> series = new XYChart.Series<>();
                series.getData().add(new XYChart.Data<>(ageVariable.toString(), tableauAge.get(ageVariable)));
                graphAge.getData().add(series);
            });


            /////////////////////////////////////////////
            //print la date d'inscription de l'user :
            System.out.println("\n");
            System.out.println("inscriptionDate :");

            tableauInscription.keySet().stream().sorted().forEach(inscriptionDate -> {
                System.out.println(inscriptionDate + " : " + tableauInscription.get(inscriptionDate));
                XYChart.Series<String, Number> series = new XYChart.Series<>();
                series.getData().add(new XYChart.Data<>(inscriptionDate.toString(), tableauInscription.get(inscriptionDate)));
                graphInscriptionDate.getData().add(series);
            });



            //////////////////////////////////////
            //ajouter les users dans la table view
            System.out.println("usersList :");
            id.setCellValueFactory(new PropertyValueFactory<>("id"));
            firstname.setCellValueFactory(new PropertyValueFactory<>("firstname"));
            lastname.setCellValueFactory(new PropertyValueFactory<>("lastname"));
            username.setCellValueFactory(new PropertyValueFactory<>("username"));
            email.setCellValueFactory(new PropertyValueFactory<>("email"));
            role.setCellValueFactory(new PropertyValueFactory<>("roleName"));
            subscription.setCellValueFactory(new PropertyValueFactory<>("subscriptionPlanType"));

            tableUsers.setItems(tableauUsers);


            /////////////////////////////////////////////
            // generate the pdf file
            // set onclick event on the button to save the pdf file

            btnSavePdf.setOnAction(e -> {
                System.out.println("Saving pdf...");
                Document document = new Document();
                try {
                    PdfWriter writer = PdfWriter.getInstance(document, new FileOutputStream("rapport.pdf"));
                    document.open();
                    Font font = FontFactory.getFont(FontFactory.COURIER, 16, BaseColor.BLACK);
                    Chunk chunk = new Chunk("Rapport", font);
                    document.add(chunk);
                    document.add(new Paragraph("Tableau des utilisateurs :"));
                    document.add(new Paragraph("\n"));
                    PdfPTable pdfTable = new PdfPTable(7);
                    pdfTable.setWidthPercentage(100);
                    pdfTable.setSpacingBefore(10f);
                    pdfTable.setSpacingAfter(10f);
                    float[] columnWidths = {1f, 1f, 1f, 1f, 1f, 1f, 1f};
                    pdfTable.setWidths(columnWidths);
                    PdfPCell cell1 = new PdfPCell(new Paragraph("Id"));
                    PdfPCell cell2 = new PdfPCell(new Paragraph("Firstname"));
                    PdfPCell cell3 = new PdfPCell(new Paragraph("Lastname"));
                    PdfPCell cell4 = new PdfPCell(new Paragraph("Username"));
                    PdfPCell cell5 = new PdfPCell(new Paragraph("Email"));
                    PdfPCell cell6 = new PdfPCell(new Paragraph("Role"));
                    PdfPCell cell7 = new PdfPCell(new Paragraph("Subscription"));
                    pdfTable.addCell(cell1);
                    pdfTable.addCell(cell2);
                    pdfTable.addCell(cell3);
                    pdfTable.addCell(cell4);
                    pdfTable.addCell(cell5);
                    pdfTable.addCell(cell6);
                    pdfTable.addCell(cell7);

                    for (User user : tableauUsers) {
                        pdfTable.addCell(String.valueOf(user.getId()));
                        pdfTable.addCell(user.getFirstname());
                        pdfTable.addCell(user.getLastname());
                        pdfTable.addCell(user.getUsername());
                        pdfTable.addCell(user.getEmail());
                        pdfTable.addCell(user.getRoleName());
                        pdfTable.addCell(user.getSubscriptionPlanType());
                    }
                    document.add(pdfTable);
                    document.close();
                    writer.close();
                    System.out.printf("PDF saved.");
                } catch (FileNotFoundException ex) {
                    throw new RuntimeException(ex);
                } catch (DocumentException ex) {
                    throw new RuntimeException(ex);
                }
            });
        } catch(Exception E){
            E.printStackTrace();
        }
    }
}
