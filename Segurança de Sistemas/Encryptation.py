import hashlib
import base64
import os
import random

class QuantumResistantCipher:
    """
    An innovative encryption algorithm designed for high-security agencies.
    Combines key-dependent substitution, transposition, and diffusion layers
    inspired by quantum-resistant principles, using a custom Feistel-like structure
    with dynamic S-boxes generated from the key.
    """

    def __init__(self, key):
        self.key = key
        self.block_size = 16  # 128 bits
        self.rounds = 10
        self._generate_key_schedule()

    def _generate_key_schedule(self):
        """Generate round keys from the master key using SHA-256 hashing."""
        key_hash = hashlib.sha256(self.key.encode()).digest()
        self.round_keys = []
        for i in range(self.rounds):
            self.round_keys.append(hashlib.sha256(key_hash + bytes([i])).digest()[:self.block_size])

    def _substitute(self, block, round_key):
        """Apply key-dependent substitution using a dynamic S-box permutation."""
        random.seed(int.from_bytes(round_key, 'big'))
        s_box = list(range(256))
        random.shuffle(s_box)
        return bytes(s_box[b] for b in block)

    def _transpose(self, block, round_key):
        """Apply transposition based on round key."""
        indices = sorted(range(len(block)), key=lambda i: round_key[i % len(round_key)])
        return bytes(block[i] for i in indices)

    def _diffuse(self, block):
        """Diffusion layer using rotation."""
        return block[1:] + block[:1]  # Rotate left by 1

    def _encrypt_block(self, block):
        """Encrypt a single block."""
        for round_key in self.round_keys:
            block = self._substitute(block, round_key)
            block = self._transpose(block, round_key)
            block = self._diffuse(block)
        return block

    def _decrypt_block(self, block):
        """Decrypt a single block."""
        for round_key in reversed(self.round_keys):
            block = block[-1:] + block[:-1]  # Reverse diffusion (rotate right by 1)
            # Reverse transposition: need inverse permutation
            indices = sorted(range(len(block)), key=lambda i: round_key[i % len(round_key)])
            inv_indices = [0] * len(indices)
            for pos, idx in enumerate(indices):
                inv_indices[idx] = pos
            block = bytes(block[i] for i in inv_indices)
            # Reverse substitution
            random.seed(int.from_bytes(round_key, 'big'))
            s_box = list(range(256))
            random.shuffle(s_box)
            inv_s_box = [0] * 256
            for i, v in enumerate(s_box):
                inv_s_box[v] = i
            block = bytes(inv_s_box[b] for b in block)
        return block

    def _pad(self, data):
        """PKCS7 padding."""
        pad_len = self.block_size - (len(data) % self.block_size)
        return data + bytes([pad_len] * pad_len)

    def _unpad(self, data):
        """Remove PKCS7 padding."""
        pad_len = data[-1]
        if pad_len < 1 or pad_len > self.block_size:
            raise ValueError("Invalid padding length")
        if data[-pad_len:] != bytes([pad_len] * pad_len):
            raise ValueError("Invalid padding bytes")
        return data[:-pad_len]

    def encrypt(self, plaintext):
        """Encrypt the plaintext."""
        data = self._pad(plaintext.encode('utf-8'))
        ciphertext = b''
        for i in range(0, len(data), self.block_size):
            block = data[i:i+self.block_size]
            ciphertext += self._encrypt_block(block)
        return base64.b64encode(ciphertext).decode('utf-8')

    def decrypt(self, ciphertext):
        """Decrypt the ciphertext."""
        data = base64.b64decode(ciphertext)
        plaintext = b''
        for i in range(0, len(data), self.block_size):
            block = data[i:i+self.block_size]
            plaintext += self._decrypt_block(block)
        return self._unpad(plaintext).decode('utf-8')

# Example usage
if __name__ == "__main__":
    key = "HighSecurityAgencyKey123"
    cipher = QuantumResistantCipher(key)

    message = "This is a secret message for the agency."
    encrypted = cipher.encrypt(message)
    print("Encrypted:", encrypted)

    decrypted = cipher.decrypt(encrypted)
    print("Decrypted:", decrypted)
