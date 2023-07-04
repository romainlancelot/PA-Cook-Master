module com.example.applijavapa2 {
    requires javafx.controls;
    requires javafx.fxml;
    requires com.google.gson;


    opens com.example.applijavapa2 to javafx.fxml;
    exports com.example.applijavapa2;
}