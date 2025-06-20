import React from 'react';
import { View, Text, StyleSheet } from 'react-native';

// Écran listant les visites (effectuées, en cours, à venir)
export default function VisitsListScreen() {
  return (
    <View style={styles.container}>
      <Text>Liste des Visites</Text>
    </View>
  );
}
const styles = StyleSheet.create({ container: { flex: 1, justifyContent: 'center', alignItems: 'center' }});
