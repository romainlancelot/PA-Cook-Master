package com.example.cookmasters;

import androidx.appcompat.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ListView;

import java.util.ArrayList;
import java.util.List;

public class Atelier extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_aterlier);

        ListView listViewAteliers;
        List<Ateliers_model> ateliersList;

        listViewAteliers = findViewById(R.id.listViewAteliers);
        ateliersList = getAteliers();

        AteliersAdapter adapter = new AteliersAdapter(this, R.layout.item_atelier, ateliersList);
        listViewAteliers.setAdapter(adapter);
    }

    private List<Ateliers_model> getAteliers() {
        List<Ateliers_model> ateliers = new ArrayList<>();

        for (int i = 1; i <= 5; i++) {
            ateliers.add(new Ateliers_model(
                    "Atelier de peinture",
                    "14:00",
                    "16:00",
                    "Explorez votre créativité avec notre atelier de peinture.",
                    "2 heures",
                    "https://www.simplilearn.com/ice9/free_resources_article_thumb/what_is_image_Processing.jpg",
                    "Salle B",
                    "contact@example.com"
            ));
        }

        return ateliers;
    }
}
