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

        ApiConnection api = new ApiConnection("", "");
        try {
            api.login();
        } catch (IOException e) {
            e.printStackTrace();
            System.exit(1);
        }

        fxmlLoader.setControllerFactory(c -> new ChartsController(api));

        Scene scene = new Scene(fxmlLoader.load());
        stage.setTitle("Hello!");
        stage.setScene(scene);
        stage.show();
    }

    public static void main(String[] args) {
        launch();
    }
}