package fr.cookmasters.javaapp;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;

import java.io.IOException;

public class Main extends Application {
    @Override
    public void start(Stage stage) throws IOException {
        FXMLLoader fxmlLoader = new FXMLLoader(Main.class.getResource("hello-view.fxml"));

        ApiConnection api = new ApiConnection("rlancelot@myges.fr", "jke7d4gDhU2862b");
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