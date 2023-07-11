package fr.cookmasters.javaapp;

import com.google.gson.*;
import com.itextpdf.text.*;
import com.itextpdf.text.pdf.PdfPCell;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.scene.chart.BarChart;
import javafx.scene.chart.PieChart;
import javafx.scene.chart.XYChart;
import javafx.scene.control.Button;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;

import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.time.LocalDate;
import java.time.Period;

public class CookingRecipesController {
    @FXML
    private Button btnReload;

    @FXML
    private Button btnSavePdf;

    @FXML
    private PieChart graphOrdered;

    @FXML
    private PieChart graphRating;

    @FXML
    private TableColumn<CookingRecipe, String> name;

    @FXML
    private TableColumn<CookingRecipe, String> description;

    @FXML
    private TableColumn<CookingRecipe, Integer> cooking_time;

    @FXML
    private TableColumn<CookingRecipe, Integer> people;

    @FXML
    private TableColumn<CookingRecipe, Integer> difficulty;

    @FXML
    private TableColumn<CookingRecipe, Integer> rating;

    @FXML
    private TableView<CookingRecipe> tableCookingRecipes;

    private ApiConnection api = new ApiConnection("javaapp@cookmasters.fr", "8l^lE8crdIn87c623ls6Pba2b*L9wx");;

    ObservableList<CookingRecipe> arrayCookingRecipes = FXCollections.observableArrayList();


    /**
     * Constructor
     *
     * @param api
     */
//    public CookingRecipesController(ApiConnection api) {
//        this.api = api;
//    }

    /**
     * Generate the graphs
     *
     * @param event
     */
    @FXML
    void generate(ActionEvent event) throws IOException {
        api.login();
        arrayCookingRecipes.clear();

        try {
            JsonObject apiCookingRecipes = api.getCookingRecipes();
            JsonElement dataElement = apiCookingRecipes.get("data");
            JsonArray dataArray = JsonParser.parseString(String.valueOf(dataElement)).getAsJsonArray();
            for (JsonElement element:dataArray) {
                JsonObject dataList = element.getAsJsonObject();

                String recipeName = dataList.get("name").getAsString();
                String recipeDescription = dataList.get("description").getAsString();
                Integer recipeCookingTime = dataList.get("cooking_time").getAsInt();
                Integer recipeDifficulty = dataList.get("difficulty").getAsInt();
                Integer recipePeople = dataList.get("people").getAsInt();

                Integer recipeRating = -1;
                if (!dataList.get("average_rating").isJsonNull()) {
                    recipeRating = dataList.get("average_rating").getAsInt();
                }

                CookingRecipe cookingRecipe = new CookingRecipe(recipeName, recipeDescription, recipeCookingTime, recipeDifficulty, recipePeople, recipeRating);
                arrayCookingRecipes.add(cookingRecipe);
            }

            name.setCellValueFactory(new PropertyValueFactory<>("name"));
            description.setCellValueFactory(new PropertyValueFactory<>("description"));
            cooking_time.setCellValueFactory(new PropertyValueFactory<>("cooking_time"));
            people.setCellValueFactory(new PropertyValueFactory<>("people"));
            difficulty.setCellValueFactory(new PropertyValueFactory<>("difficulty"));
            rating.setCellValueFactory(new PropertyValueFactory<>("rating"));

            tableCookingRecipes.setItems(arrayCookingRecipes);

            for (CookingRecipe cookingRecipe:arrayCookingRecipes) {
                System.out.println(cookingRecipe.getName());
                System.out.printf("Description : %s\n", cookingRecipe.getDescription());
                System.out.printf("Temps de cuisson : %d\n", cookingRecipe.getCooking_time());
                System.out.printf("Difficulté : %d\n", cookingRecipe.getDifficulty());
                System.out.printf("Nombre de personnes : %d\n", cookingRecipe.getPeople());
                System.out.printf("Note : %d\n", cookingRecipe.getRating());
                System.out.println("--------------------------------------------------");
            }


            btnSavePdf.setOnAction(e -> {
                System.out.println("Saving pdf...");
                Document document = new Document();
                try {
                    PdfWriter writer = PdfWriter.getInstance(document, new FileOutputStream("rapport_cooking_recipes.pdf"));
                    document.open();
                    Font font = FontFactory.getFont(FontFactory.COURIER, 16, BaseColor.BLACK);
                    Chunk chunk = new Chunk("Rapport", font);
                    document.add(chunk);
                    document.add(new Paragraph("Tableau des recettes de cuisine :"));
                    document.add(new Paragraph("\n"));
                    PdfPTable pdfTable = new PdfPTable(6);
                    pdfTable.setWidthPercentage(100);
                    pdfTable.setSpacingBefore(10f);
                    pdfTable.setSpacingAfter(10f);
                    float[] columnWidths = {1f, 1f, 1f, 1f, 1f, 1f, 1f};
                    pdfTable.setWidths(columnWidths);
                    PdfPCell cell1 = new PdfPCell(new Paragraph("Titre"));
                    PdfPCell cell2 = new PdfPCell(new Paragraph("Description"));
                    PdfPCell cell3 = new PdfPCell(new Paragraph("Temps de cuisson"));
                    PdfPCell cell4 = new PdfPCell(new Paragraph("Difficulté"));
                    PdfPCell cell5 = new PdfPCell(new Paragraph("Nombre de personnes"));
                    PdfPCell cell6 = new PdfPCell(new Paragraph("Note"));
                    pdfTable.addCell(cell1);
                    pdfTable.addCell(cell2);
                    pdfTable.addCell(cell3);
                    pdfTable.addCell(cell4);
                    pdfTable.addCell(cell5);
                    pdfTable.addCell(cell6);
                    for (CookingRecipe cookingRecipe : arrayCookingRecipes) {
                        pdfTable.addCell(cookingRecipe.getName());
                        pdfTable.addCell(cookingRecipe.getDescription());
                        pdfTable.addCell(String.valueOf(cookingRecipe.getCooking_time()));
                        pdfTable.addCell(String.valueOf(cookingRecipe.getDifficulty()));
                        pdfTable.addCell(String.valueOf(cookingRecipe.getPeople()));
                        pdfTable.addCell(String.valueOf(cookingRecipe.getRating()));
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
