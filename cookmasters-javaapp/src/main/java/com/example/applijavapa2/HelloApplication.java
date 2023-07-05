package com.example.applijavapa2;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;

import com.google.gson.JsonObject;

public class HelloApplication extends Application {
    @Override
    public void start(Stage stage) throws IOException {
        FXMLLoader fxmlLoader = new FXMLLoader(HelloApplication.class.getResource("hello-view.fxml"));
        Scene scene = new Scene(fxmlLoader.load());
        stage.setTitle("Hello!");
        stage.setScene(scene);
        stage.show();
    }

    public static void main(String[] args) {
        launch();

        /**
         * Example of ApiConnection connection
         */
        ApiConnection api = new ApiConnection("", "");
        try {
            api.login();
            JsonObject users = api.getUsers();
            System.out.println(users);
        } catch (IOException e) {
            e.printStackTrace();
        }
        
    }
}