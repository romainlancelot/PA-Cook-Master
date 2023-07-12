package com.example.cookmasters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.squareup.picasso.Picasso;

import java.util.List;

public class AteliersAdapter extends ArrayAdapter<Ateliers_model> {
    private Context context;
    private List<Ateliers_model> ateliers;

    public AteliersAdapter(@NonNull Context context, int resource, @NonNull List<Ateliers_model> objects) {
        super(context, resource, objects);
        this.context = context;
        this.ateliers = objects;
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        if (convertView == null) {
            convertView = LayoutInflater.from(context).inflate(R.layout.item_atelier, parent, false);
        }

        Ateliers_model atelier = ateliers.get(position);

        ImageView imageViewPhoto = convertView.findViewById(R.id.imageViewPhoto);
        TextView textViewTitle = convertView.findViewById(R.id.textViewTitle);
        TextView textViewTime = convertView.findViewById(R.id.textViewTime);
        TextView textViewDescription = convertView.findViewById(R.id.textViewDescription);

        //Picasso.get().load(atelier.getPhotoUrl()).into(imageViewPhoto);
        imageViewPhoto.setImageResource(R.drawable.image_logo);

        textViewTitle.setText(atelier.getTitle());
        textViewTime.setText(atelier.getStartHour() + " - " + atelier.getEndHour());
        textViewDescription.setText(atelier.getDescription());

        return convertView;
    }
}
