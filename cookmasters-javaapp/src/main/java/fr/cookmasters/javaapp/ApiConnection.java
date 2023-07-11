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
    public static final String URL_COOKING_RECIPES = URL + "/cooking-recipes";

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
     * Template for API request
     *
     * @param url
     * @param method
     * @param token
     * @return HttpURLConnection
     * @throws IOException
     * @throws RuntimeException
     */
    private HttpURLConnection request(String url, String method, Boolean token) throws IOException, RuntimeException {
        HttpURLConnection con = (HttpURLConnection) URI.create(url).toURL().openConnection();
        con.setRequestMethod(method);
        con.setRequestProperty("Content-Type", "application/json");
        if (token) {
            con.setRequestProperty("Authorization", "Bearer " + this.token);
        }

        return con;
    }

    /** Check request status
     *
     * @param con
     * @throws IOException
     * @throws RuntimeException
     */
    private void checkStatus(HttpURLConnection con) throws IOException, RuntimeException {
        int status = con.getResponseCode();
        if (status != 200) {
            throw new RuntimeException("Failed : HTTP error code : " + status);
        }
    }

    /**
     * Template to get json from API
     *
     * @param con
     * @return json
     * @throws IOException
     * @throws RuntimeException
     */
    private JsonObject getJson(HttpURLConnection con) throws IOException, RuntimeException {
        StringBuilder content = new StringBuilder();
        Scanner scanner = new Scanner(con.getInputStream());
        while (scanner.hasNext()) {
            content.append(scanner.nextLine());
        }
        scanner.close();

        return JsonParser.parseString(content.toString()).getAsJsonObject();
    }



    /**
     * Login and set token
     * 
     * @throws IOException
     * @return void
     */
    public void login() throws IOException {
        HttpURLConnection con = this.request(URL_LOGIN, "POST", false);

        String jsonInputString = "{\"email\": \"" + this.email + "\", \"password\": \"" + this.password + "\"}";
        con.setDoOutput(true);
        con.getOutputStream().write(jsonInputString.getBytes());

        this.checkStatus(con);

        JsonObject jsonObject = this.getJson(con);
        this.token = jsonObject.get("data").getAsJsonObject().get("token").getAsString();
    }

    /**
     * Get users from API
     * return json
     * 
     * @return json
     */
    public JsonObject getUsers() throws IOException {
        HttpURLConnection con = this.request(URL_USERS, "GET", true);
        this.checkStatus(con);

        return this.getJson(con);
    }

    /**
     * Get cooking recipes from API
     * return json
     *
     * @return json
     */
    public JsonObject getCookingRecipes() throws IOException {
        HttpURLConnection con = this.request(URL_COOKING_RECIPES, "GET", true);
        this.checkStatus(con);

        return this.getJson(con);
    }
}
