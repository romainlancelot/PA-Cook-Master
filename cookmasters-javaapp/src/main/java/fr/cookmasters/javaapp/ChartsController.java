package fr.cookmasters.javaapp;

import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.chart.BarChart;
import javafx.scene.chart.PieChart;
import com.google.gson.*;
import javafx.scene.chart.XYChart;
import javafx.scene.control.Button;

import java.io.IOException;

public class ChartsController {
    @FXML
    private PieChart camenbert;

    @FXML
    private BarChart<String, Number> age;

    @FXML
    private BarChart<String, Number> revenu;

    @FXML
    private Button btnCamenbert;
    int pro, free, basic;
    // String path = "C:\\Users\\sagej\\OneDrive\\Documents\\ESGI\\2ème année\\2ème Semestre\\Java\\Projets\\APPLIJAVAPA2\\json\\data.json";

    private ApiConnection api = null;

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
        camenbert.getData().clear();
        age.getData().clear();

        try {
            JsonObject users = api.getUsers();
            System.out.println(users);
            JsonElement dataElement = users.get("data");
            JsonElement nameElement = users.get("firstname");

            JsonElement spElement = users.get("subscription_plan_id");
            JsonArray dataArray = JsonParser.parseString(String.valueOf(dataElement)).getAsJsonArray();
            for (JsonElement element:dataArray) {
                JsonObject dataList = element.getAsJsonObject();
                String spFirstname = dataList.get("firstname").getAsString();
                System.out.println(spFirstname);
                int spData = dataList.get("subscription_plan_id").getAsInt();
                switch (spData) {
                    case 1: free++;
                    break;
                    case 2: basic++;
                    break;
                    case 3: pro++;
                    break;
                }
            }
            System.out.println(free);
            System.out.println(basic);
            System.out.println(pro);

            PieChart.Data freeData = new PieChart.Data("free", free);
            PieChart.Data basicData = new PieChart.Data("basic", basic);
            PieChart.Data proData = new PieChart.Data("pro", pro);

            camenbert.getData().add(freeData);
            camenbert.getData().add(basicData);
            camenbert.getData().add(proData);

            //nombre de ID
            XYChart.Series identifiant = new XYChart.Series();
            identifiant.setName("ID");
            for (JsonElement element:dataArray){
                JsonObject idElement = element.getAsJsonObject();
                int id = idElement.get("id").getAsInt();
                String idString = idElement.get("id").getAsString();
                System.out.println(id);
                identifiant.getData().add(new XYChart.Data(idString, id));
            }

            age.getData().add(identifiant);

            //revenus
            XYChart.Series revenus = new XYChart.Series();
            revenus.setName("Revenus");

            for (JsonElement element:dataArray){
                JsonObject dataList = element.getAsJsonObject();
                System.out.println(spElement);
            }

        }

        catch(Exception E){
            E.printStackTrace();
        }
    }

}
