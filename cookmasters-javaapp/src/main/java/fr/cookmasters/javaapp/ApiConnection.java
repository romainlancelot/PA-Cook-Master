package fr.cookmasters.javaapp;

import java.io.IOException;
import java.net.HttpURLConnection;
import java.net.URI;
import java.util.Scanner;

import com.google.gson.JsonObject;
import com.google.gson.JsonParser;

public class ApiConnection {
    public static final String URL = "https://cookmasters.fr/api";
    public static final String URL_LOGIN = URL + "/login";
    public static final String URL_USERS = URL + "/users";
    
    private String email;
    private String password;
    private String token;


    /**
     * Constructor
     * 
     * @param email
     * @param password
     */
    public ApiConnection(String email, String password) {
        this.email = email;
        this.password = password;
    }

    
    /**
     * Login and set token
     * 
     * @throws IOException
     * @return void
     */
    public void login() throws IOException {
        HttpURLConnection con = (HttpURLConnection) URI.create(URL_LOGIN).toURL().openConnection();
        con.setRequestMethod("POST");
        con.setRequestProperty("Content-Type", "application/json");

        String jsonInputString = "{\"email\": \"" + this.email + "\", \"password\": \"" + this.password + "\"}";
        con.setDoOutput(true);
        con.getOutputStream().write(jsonInputString.getBytes());

        int status = con.getResponseCode();
        if (status != 200) {
            throw new RuntimeException("Failed : HTTP error code : " + status);
        }

        StringBuilder content = new StringBuilder();
        Scanner scanner = new Scanner(con.getInputStream());
        while (scanner.hasNext()) {
            content.append(scanner.nextLine());
        }
        scanner.close();

        JsonObject jsonObject = JsonParser.parseString(content.toString()).getAsJsonObject();
        this.token = jsonObject.get("data").getAsJsonObject().get("token").getAsString();

        System.out.println(this.token);
    }

    /**
     * Get users from API
     * return json
     * 
     * @return json
     */
    public JsonObject getUsers() throws IOException {
        HttpURLConnection con = (HttpURLConnection) URI.create(URL_USERS).toURL().openConnection();
        con.setRequestMethod("GET");
        con.setRequestProperty("Content-Type", "application/json");
        con.setRequestProperty("Authorization", "Bearer " + this.token);

        int status = con.getResponseCode();
        if (status != 200) {
            throw new RuntimeException("Failed : HTTP error code : " + status);
        }

        StringBuilder content = new StringBuilder();
        Scanner scanner = new Scanner(con.getInputStream());
        while (scanner.hasNext()) {
            content.append(scanner.nextLine());
        }
        scanner.close();

        JsonObject jsonObject = JsonParser.parseString(content.toString()).getAsJsonObject();

        return jsonObject;
    }


}
