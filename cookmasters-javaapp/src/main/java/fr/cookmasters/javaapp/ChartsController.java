package fr.cookmasters.javaapp;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.chart.BarChart;
import javafx.scene.chart.PieChart;
import com.google.gson.*;
import javafx.scene.chart.XYChart;
import javafx.scene.control.Button;
import java.time.LocalDate;
import java.time.Period;
import java.io.IOException;
import java.util.HashMap;

public class ChartsController {
    @FXML
    private PieChart camenbert;

    @FXML
    private PieChart camenbert1;
    @FXML
    private BarChart<String, Number> age;

    @FXML
    private BarChart<Number, Number> vraiAge;

    @FXML
    private Button btnCamenbert;
    int pro, free, basic;
    int user, admin;
    // String path = "C:\\Users\\sagej\\OneDrive\\Documents\\ESGI\\2ème année\\2ème Semestre\\Java\\Projets\\APPLIJAVAPA2\\json\\data.json";

    private ApiConnection api = null;

    HashMap<Integer, Integer> tableauAge = new HashMap<>();
    Integer ageVariable = null;
    Integer nombreAge = 1;


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
        camenbert.getData().clear();
        camenbert1.getData().clear();
/*
        age.getData().clear();
*/
        //remettre les var a 0:
        pro = 0;
        free = 0;
        basic = 0;
        user = 0;
        admin = 0;
/*
        vraiAge.getData().clear();
*/

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
                JsonElement countryElement = dataList.get("country");
                if (countryElement != null  && !(countryElement instanceof JsonNull)) {
                    String spPays = dataList.get("country").getAsString();
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
                    LocalDate birthday = LocalDate.parse(birthdayString);

                    // Calculer l'âge
                    LocalDate currentDate = LocalDate.now();
                    Period age = Period.between(birthday, currentDate);
                    years = age.getYears();

                    // Utiliser l'âge
                    Integer spAge = years;
                    System.out.println("date de naissance : " + birthday);
                    System.out.println("age : " + years + " ans.");
                    ageVariable = years;
                    if (tableauAge.containsKey(ageVariable)) {
                        Integer nombreAge = tableauAge.get(ageVariable);
                        tableauAge.put(ageVariable, nombreAge + 1);
                    } else {
                        tableauAge.put(ageVariable, nombreAge);
                        Integer nombreAge = tableauAge.get(ageVariable);
                    }/*
                    vraiAge.getData().clear(); // Efface toutes les séries de données existantes
                    XYChart.Series<Number, Number> dataSeries = new XYChart.Series<>();
                    for (int vraiAge : tableauAge.keySet()) {
                        int count = tableauAge.get(vraiAge);
                        dataSeries.getData().add(new XYChart.Data<>(vraiAge, count));
                    }

                    vraiAge.getData().add(dataSeries); // Ajoute la nouvelle série de données au graphique*/

                } else {
                    // La valeur est nulle, faire quelque chose en conséquence
                    System.out.println("Date de naissance inconnue.");
                    System.out.println("age inconnu.");
                }
                /////////////////////////////////////////////


                /////////////////////////////////////////////
                //recup le type de subscription de l'user :
                int spData = dataList.get("subscription_plan_id").getAsInt();
                switch (spData) {
                    case 1: free++;
                    break;
                    case 2: basic++;
                    break;
                    case 3: pro++;
                    break;
                }
                /////////////////////////////////////////////

                /////////////////////////////////////////////
                //recup le role de l'user :
                String roleName = dataList.get("role").getAsJsonObject().get("name").getAsString();
                System.out.println("role : " + roleName);
                switch (roleName) {
                    case "admin": admin++;
                        break;
                    case "user": user++;
                        break;
                }
                /////////////////////////////////////////////
            }

            //////////////////////////////////////////////////////////////////////////////////////////
            /////////////////////////////////////////////
            //print le type de subscription de l'user :
            System.out.println("\n");
            System.out.println("roleName :");
            System.out.println("admin : " + admin);
            System.out.println("user : " + user);
            System.out.println("\n");

            /////////////////////////////////////////////
            //print le type de role de l'user :
            System.out.println("subscriptionPlanType :");
            System.out.println("free : " + free);
            System.out.println("basic : " + basic);
            System.out.println("pro : " + pro);
            System.out.println("\n");

            //subscription id camenbert
            PieChart.Data freeData = new PieChart.Data("free", free);
            PieChart.Data basicData = new PieChart.Data("basic", basic);
            PieChart.Data proData = new PieChart.Data("pro", pro);

            camenbert.getData().add(freeData);
            camenbert.getData().add(basicData);
            camenbert.getData().add(proData);

            //roleName camenbert
            PieChart.Data userData = new PieChart.Data("user", user);
            PieChart.Data adminData = new PieChart.Data("admin", admin);

            camenbert1.getData().add(userData);
            camenbert1.getData().add(adminData);




           /* //nombre de ID
            XYChart.Series identifiant = new XYChart.Series();
            identifiant.setName("ID");
            for (JsonElement element:dataArray){
                JsonObject idElement = element.getAsJsonObject();
                int id = idElement.get("id").getAsInt();
                String idString = idElement.get("id").getAsString();
                identifiant.getData().add(new XYChart.Data(idString, id));
            }

            age.getData().add(identifiant);*/

            /*//vraiAge
            XYChart.Series revenus = new XYChart.Series();
            revenus.setName("AGE");

            for (JsonElement element:dataArray){
                JsonObject dataList = element.getAsJsonObject();
            }

            vraiAge.getData().add(identifiant);*/


            for (Integer ageVariable : tableauAge.keySet()) {
                System.out.println(ageVariable + " : " + tableauAge.get(ageVariable));
            }

        }

        catch(Exception E){
            E.printStackTrace();
        }
    }

}
