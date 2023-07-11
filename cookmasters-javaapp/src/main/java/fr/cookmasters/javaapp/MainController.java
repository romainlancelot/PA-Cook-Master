package fr.cookmasters.javaapp;

import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.control.Tab;
import javafx.scene.layout.AnchorPane;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;

public class MainController implements Initializable {
    @FXML
    Tab tabUsers;

    @FXML
    Tab tabCookingRecipes;

    @Override
    public void initialize(URL location, ResourceBundle resources)
    {
//        ApiConnection api = new ApiConnection("", "");
//        try {
//            api.login();
//        } catch (IOException e) {
//            e.printStackTrace();
//            System.exit(1);
//        }

        // add ApiConnection api to the constructor of the controllers
//        FXMLLoader loaderUsers = new FXMLLoader(getClass().getResource("users-view.fxml"));
//        FXMLLoader loaderCookingRecipes = new FXMLLoader(getClass().getResource("cooking-recipes-view.fxml"));
//
//        try {
//            loaderUsers.setController(new UsersController(api));
//            loaderCookingRecipes.setController(new CookingRecipesController(api));
//        } catch (Exception e) {
//            e.printStackTrace();
//            System.exit(1);
//        }
    }
}