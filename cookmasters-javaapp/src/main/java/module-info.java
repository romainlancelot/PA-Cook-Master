module fr.cookmasters.javapp {
    requires javafx.controls;
    requires javafx.fxml;
    requires com.google.gson;

    opens fr.cookmasters.javaapp to javafx.fxml;
    exports fr.cookmasters.javaapp;
}