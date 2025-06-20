import React from 'react';
import { View, Text, Button, StyleSheet } from 'react-native';

// Écran d'authentification du guide
export default function LoginScreen({ navigation }) {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Travel Paradise</Text>
    </View>
  );
}
const styles = StyleSheet.create({ container: { flex: 1, justifyContent: 'center', alignItems: 'center' }, title: { fontSize: 24, fontWeight: 'bold' }});
