import React from 'react';
import { View, Text, StyleSheet } from 'react-native';

// Écran pour faire l'appel des visiteurs
export default function RollCallScreen() {
  return (
    <View style={styles.container}>
      <Text>Appel des Visiteurs</Text>
    </View>
  );
}
const styles = StyleSheet.create({ container: { flex: 1, justifyContent: 'center', alignItems: 'center' }});
